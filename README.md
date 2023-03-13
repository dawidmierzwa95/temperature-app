<h5>Autor<h5/>
Dawid Mierzwiński - dawidmierzwa95@gmail.com

<h5>Stanowisko<h5/>
Programista PHP

<h5>Opis realizacji<h5/>

Starałem się klasy/funkcje/zmienne tytułować opisowo oraz korzystać z natywnych rozwiązań Laravela. 
W ramach wymiany danych w aplikacji zdecydowałem się na stworzenie dodatkowej warstwy kontroli w postaci repozytoriów. Zdecydowałem się na dodawanie wartości temperatury (`ThermostatTemperature`) za pośrednictwem modelu `Thermostat`.
Aplikacja pisania z myślą o skali Celsjusza (brak wskazanej konkretnej skali w treści zadania).
W pliku `App\Repositories\ThermostatTemperatureRepository` znajduje się miejsce na szybkie rozbudowanie aplikacji o wspominaną metodę w opisie zadania (możliwość pobrania temperatury historycznej).
W tytule zadania widniała nazwa "PHP v7", założyłem więc że zadanie powinno zostać wykonane w środowisku zbliżonym do wersji 7 - wykorzystałem wersję PHP 7.4.
Minimalna temperatura do wysłania notyfikacji została opisana jako "np. 15", dodałem więc możliwość dostosowania tego parametru poprzez zmienną `MIN_TEMPERATURE_TO_SEND_NOTIFY` w .env (brak dodatkowej kontroli in-code za pomocą pliku konfiguracyjnego). Domyślna wartość hard-coded to 15.
Kodu nie obłożyłem dodatkowymi komentarzami (oprócz tych natywnie dodanych przez Laravela) - zakładam że kod jest czytelny.
Treść zadania wymagała od pola "date" wartość input charakteryzowanej jako "timestamp" (w rozumieniu wysokoliczbowego inta). 
Rozwiązanie wymagało albo stworzenia dodatkowej zasady (sprawdzenie poprawności zapisu timestamp jako int), albo walidowania daty w odpowiednim formacie a zapisanie jako timestamp. Przystałem przy drugiej opcji korzystając z zasady `date_format` o wartości `Y-m-d H:i:s`.
Zdecydowałem się na `tinyInteger` dla `temperature_value` w tabeli `thermostat_temperatures` (zakładam, że zakres ~ -120:120 jest wystarczający dla realnych temperatur jakie można odczytać z urządzeń). W przypadku obsługi dodatkowej skali np. Fahrenheita, typ kolumny należy zaktualizować do większego zakresu np. `smallInteger` lub przeliczać z bazowej skali (zakładając skalę Celsjusza). 
Wyłączyłem domyślne middleware w grupie `api`. Model `ThermostatTemperature` oraz tabela `thermostat_temperatures` nie posiada domyślnych timestamps `created_at` oraz `updated_at` (czas odczytu `snapshot_at` pokrywa wymagania)

Pod `db:seed` sample data.

<h5>Zbiór ewentualnych pytań<h5/>
<ul>
<li>Czy aplikacja powinna brać pod uwagę również skalę Fahrenheita?</li>
<li>Czy i jakie zabezpieczenie będzie obowiązywać w komunikacji między termostatem a endpointami API? (potencjalne zagrożenie naruszenia integralności danych innych termostatów przez klienta)</li>
<li>Czy będziemy migrować do wyższej wersji PHP, >8.0?</li>
<li>Jakie minimalne i maksymalne wartości temperatury będzie przechowywać aplikacja? (jaki zakres jest realny biorąc pod uwagę problem jaki rozwiązuje aplikacja - np. termostat w mieszkaniu)</li>
<li>Czy parametr `date` musi być timestamp (int) czy może być wysyłany w określonym formacie?</li>
<li>Czy e-maile będą zawsze wysyłane on-demand czy przewidywana jest inna strategia np. kolejkowania?</li>
</ul>


