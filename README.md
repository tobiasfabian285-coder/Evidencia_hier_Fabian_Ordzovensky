**Evidencia hier - Mini Webová Aplikácia**
Tento projekt je mini webová aplikácia na evidenciu hier, vytvorená v čistom jazyku PHP s využitím databázy MySQL (mysqli). Cieľom aplikácie je preukázať schopnosť pracovať s databázou, HTML formulármi a implementovať všetky základné operácie nad dátami. Aplikácia pracuje s dvoma prepojenými tabuľkami (categories a hry).

**Funkcionalita (CRUD)Aplikácia úspešne spĺňa nasledujúce operácie:**
**Create (vytvorenie):** Pridávanie nových hier do databázy pomocou zabezpečeného formulára (ochrana proti SQL injection cez mysqli_real_escape_string).
**Read (zobrazenie):** Zobrazenie zoznamu všetkých uložených hier a ich kategórií z databázy v prehľadnej tabuľke.
**Update (úprava):** Možnosť upraviť existujúce informácie o hre v samostatnom formulári.
**Delete (mazanie):** Odstránenie vybranej hry z evidencie pomocou GET požiadavky.

**Použité technológie:**
Čisté PHP (bez využitia frameworkov ako Laravel).
Databáza MySQL cez rozšírenie mysqli (nie PDO).
HTML5 a CSS (použitý framework Bootstrap 5.3.2 pre moderný a responzívny dizajn).

**Štruktúra súborov**
**Databaza_evidencia_hier.php-** Samostatný inicializačný skript. Po jeho spustení sa vytvorí databáza evidencia_hier, prepojené tabuľky a vložia sa testovacie (dummy) dáta.
**Evidencia_hier_Fabian_Ordzovensky.php -** Hlavný súbor aplikácie. Obsahuje zobrazenie zoznamu hier, formulár na pridanie novej hry (POST) a logiku pre mazanie záznamov (GET).
**upravit.php -** Súbor slúžiaci výhradne na načítanie a úpravu existujúceho záznamu o hre na základe jej ID.

**Inštalácia a spustenie aplikácie**
Umiestnite všetky .php súbory na lokálny webový server (napríklad XAMPP, WAMP, Laragon - priečinok htdocs alebo www).
Uistite sa, že beží Apache a MySQL server. Prihlasovacie údaje k databáze sú v kóde nastavené na localhost, používateľ root, heslo root.
V prehliadači otvorte súbor Databaza_evidencia_hier.php. Tento krok je nutný na vytvorenie databázy a naplnenie dát.
Následne otvorte hlavný súbor Evidencia_hier_Fabian_Ordzovensky.php a môžete aplikáciu plnohodnotne používať.

**Priebeh projektu a Checkpointy**
**13.04. -** Začiatok projektu: Vytvorená základná štruktúra súborov a návrh databázy.
**16.04. -** Vytvorenie skriptu na funkčné pripojenie na databázu a implementácia prvých CRUD operácií (Create, Read).
**20.04. -** Dokončenie a odladenie zvyšných CRUD operácií (Update, Delete) a prepojenia tabuliek.
**23.04. -** Finálna verzia aplikácie: Doplnenie validácie formulárov, implementácia Bootstrapu, prečistenie kódu a vytvorenie README.md
