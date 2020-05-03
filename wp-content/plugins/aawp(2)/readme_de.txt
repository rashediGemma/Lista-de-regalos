=== Amazon Affiliate for WordPress ===
Contributors: flowdee
Donate link: https://donate.flowdee.de
Tags: amazon, affiliate
Requires at least: 3.0.1
Tested up to: 4.9.8

Dynamisch und komplett automatisierte Amazon Produktboxen, Listen und vieles mehr!

== Changelog ==

= Version 3.8.7 (31. August 2018) =
* Verbesserung: Mit dem Shortcode-Attribut numbering="none" kann die Nummerierungs-Spalte im Template "table" ausgeblendet werden
* Fehlerbehebung: Links zu den Produkt-Bewertungen waren fehlerhaft, nachdem Amazon die URL geändert hat. Es wurde eine Übergangs-Lösung eingebaut.

= Version 3.8.6 (21. August 2018) =
* Verbesserung: Optimierung der Handhabung von Produkt-Varianten
* Fehlerbehebung: WP Rocket's Einstellung "Javascript zusammenfassen" sorgte dafür, dass AAWP's Geotargeting Javascript Code entfernt wurde
* Fehlerbehebung: "Column 'title' cannot be null for query INSERT INTO `aawp_products`
* WordPress v4.9.8 Kompatibilität

= Version 3.8.5 (14. June 2018) =
* Fix: Nach dem letzten Update funktionierte das Geotargeting unter Umständen nicht für jeden Seitenbesucher

= Version 3.8.4 (11. Juni 2018) =
* Neu: Einstellung zur Auswahl des bevorzugten Geotargeting API-Services hinzugefügt
* Verbesserung: "geoip-db.com" als neuen Standard für den Geotargeting API-Service festgelegt
* Fehlerbehebung: Bei Verwendung des zuletzt hinzugefügten Geotargeting API-Services, trat unter gewissen Umständen der Fehler "No 'Access-Control-Allow-Origin' header is present on the requested resource" auf

= Version 3.8.3 (4. Juni 2018) =
* Verbesserung: Fehlerbehandlung der Bild-Proxy-Datei wurde optimiert
* Verbesserung: .htaccess hinzugefügt, um bei einem Zugriff auf die Bild-Proxy-Datei, den Fehler "Permission Denied" zu vermeiden

= Version 3.8.2 (24. Mai 2018) =
* Neu: Shortcode-Attribut "button_style" hinzugefügt, um den Button-Style auf Shortcode-Basis anzupassen
* Verbesserung: Bild-Proxy setzt PHP "allow_url_fopen" voraus; Hinweis zu den Einstellungen, sowie eine Abhängigkeits-Prüfung bei der letztendlichen Ausgabe, hinzugefügt
* Verbesserung: Bild-Proxy wird nun ebenfalls angewandt, wenn die Amazon-Bild-URL händisch via Shortcode gesetzt wurde
* Verbesserung: Optimierung des CSS der Platzhalter-Bilder (Vergleichstabellen- und Grid-Template)

= Version 3.8.1 (16. Mai 2018) =
* Fix: Bild-Proxy (eingeführt mit v3.8) funktionierte nicht korrekt

= Version 3.8.0 (15. Mai 2018) =
* Neu: Amazon Australien kann nun als Shop ausgewählt werden
* Neu: Einstellung hinzugefügt, die es ermöglicht, Produktbilder über einen Datenschutz-Proxy auszuliefern (DSGVO)
* Verbesserung: Geotargeting greift fortan auf die schnellere und zuverlässigere API "ipdata.co" zurück
* Verbesserung: Entfernen der Ausgabe beim Durchlauf der Cron-Events, welche evtl. in entsprechenden Log-Dateien auftauchte
* Fehlerbehebung: "PHP Notice: Undefined index: filter in /aawp/includes/functions/components/items.php on line 352"

= Version 3.7.1 (13. April 2018) =
* Verbesserung: Aus Sicherheitsgründen, muss die zuvor eingeführte Funktion der "lokalen Produktbilder" über den WordPress-Filter "aawp_product_local_images_enabled" freigeschalten werden
* Verbesserung: Tägliche Routine zum Löschen von lokalen Produktbildern hinzugefügt

= Version 3.7.0 (12. April 2018) =
* Neu: Neue Einstellung hinzugefügt, wodurch Produktbilder heruntergeladen und lokal ausgeliefert werden können, anstatt Amazon's Server zu verwenden
* Verbesserung: Prüfung auf verfügbare Plugin-Updates wurde optimiert

= Version 3.6.12 (10. April 2018) =
* Neu: Filter-Wert "prime" hinzugefügt, um Produkte/Listen nach "Amazon Prime" zu filtern
* Neu: Produktbilder, die über den Field-Shortcode ausgegeben werden, können durch das Attribut image_align="center" zentriert werden
* Verbesserung: Produktbeschreibung für herunterladbare Musiktitel wurde optimiert
* Verbesserung: Das Plugin prüft nun ebenfalls, ob die "PHP XML"-Erweiterung auf dem Server aktiviert ist
* Fehlerbehebung: Der "Google AMP Valditor" bestandete Markup-Fehler in Kombination mit dem Plugin "Better AMP"
* Fehlerbehebung: Bei gleichzeitiger Verwendung der Filter- sowie Sortierungs-Funktion, wurden nicht die erwarteten Ergebnisse zurückgeliefert
* Fehlerbehebung: Bei Verwendung des "table" Templates wurde ein eventuell überschriebenes "Bestseller-Label" nicht übernommen
* Fehlerbehebung: "PHP Warning: sizeof(): Parameter must be an array or an object that implements Countable in ../includes/aawp/class.aawp-api.php on line 744"
* PHP v7.2 Kompatibilität
* WordPress v4.9.5 Kompatibilität

= Version 3.6.11 (6. März 2018) =
* Neu: Die Beschriftung "Bewertungen" kann nun über die Plugin-Einstellungen angepasst werden
* Neu: Durch den Field-Parameter "used_price" kann nun der Gebraucht-Preis ausgegeben werden
* Neu: Unterstützung für das Plugin "Better AMP"
* Verbesserung: Click-Tracking für Google Analytics wurde optimiert
* Verbesserung: Geschwindigkeit des Link-Shortcodes wurde verbessert
* Verbesserung: Bessere Formatierung der Anzahl abgegebener Kundenbewertungen
* Verbesserung: HTML-Container um den Hinweis "Noch keine Bewertungen vorhanden" hinzugefügt ("table" Template)
* Fehlerbehebung: "Cannot redeclare class simple_html_dom_node"
* Fehlerbehebung: "PHP Warning: sizeof(): Parameter must be an array or an object that implements Countable in .../includes/aawp/class.aawp-api.php on line 328"
* Fehlerbehebung: "PHP Warning: sizeof(): Parameter must be an array or an object that implements Countable in product-helper-functions.php on line 56"
* Kleinere CSS-Verbesserungen
* Plugin-Übersetzungen wurden aktualisiert
* Folgende Templates wurden angepasst: /table.php
* WordPress v4.9.4 Kompatibilität

= Version 3.6.10 (23. Januar 2018) =
* Verbesserung: Amazon Frankreich und Spanien verwenden nun ebenfalls das Prime- anstatt des Premium-Logos
* Fehlerbehebung: Manuelles Erneuern des Caches war nach dem letzten Plugin-Update nicht mehr möglich
* Fehlerbehebung: Programmatisches Setzen der Bildbreite/-Höhe wurde wieder entfernt
* Kleinere Verbesserungen und Fehlerbehebungen
* Plugin-Übersetzungen wurden aktualisiert
* WordPress v4.9.2 Kompatibilität

= Version 3.6.9 (15. Januar 2018) =
* Neu: Platzhalter %yoast_focus_keyword% hinzugefügt, der als "Keyword" für Bestseller-Listen verwendet werden kann
* Neu: Shortcode-Attribut "button_class" hinzugefügt, um den Buttons eigene CSS-Klassen zu übergeben
* Verbesserung: Verkaufspreis kann nun über das Shortcode-Attribute price="show" eingeblendet bzw. price="hide" ausgeblendet werden
* Verbesserung: Optimierung des Geo-Targeting (besonders für Regionen Nord- und Südamerika)
* Verbesserung: Ausgabe der HTML-Attribute "title" und "alt" wurde optimiert
* Verbesserung: Ausgabe von mehrsilbigen "Keywords" in den Super URLs wurde optimiert
* Verbesserung: Laden der AMP-Styles wurde optimiert
* Verbesserung: Das Vergleichstabellen-Feld "Eigenes HTML" führt nun Shortcodes aus
* Fehlerbehebung: Produkte mit Emojis in der Produktbeschreibung, konnten nicht in der Datenbank gespeichert werden
* Fehlerbehebung: In den Plugin-Einstellungen waren nicht alle HTML-IDs einzigartig
* Fehlerbehebung: Im Bearbeitungs-Modus der Vergleichstabellen wurde ein fehlerhafter Link zu den Plugin-Einstellungen ausgegeben

= Version 3.6.8 (5. Dezember 2017) =
* Neu: Preisreduzierung wird nun auch im "table"-Template ausgegeben
* Verbesserung: Optimierung der Einstellungen zum Ausblenden von Beschriftungen (erste Spalte) in Vergleichstabellen
* Verbesserung: Die Einstellung "Produktbeschreibung auf mobilen Endgeräten anzeigen" wird nun auch auf das "AMP"-Template angewandt
* Verbesserung: Das Shortcode-Attribut "title_length" kann nun ebenfalls in Kombination mit dem Link-Shortcode verwendet werden
* Verbesserung: Optimierung der HTML-Ausgabe von Buttons
* Fehlerbehebung: In Verbindung mit dem "table"-Template konnte die Preis-Spalte nicht über das Shortcode Attribut price="none" ausgeblendet werden
* Fehlerbehebung: Durch die letzten WordPress Core Updates wurden die Farbwähler des Plugins im Admin-Bereich nicht mehr korrekt dargestellt
* Fehlerbehebung: Bei Übergabe einer langen Browse Node ID kam es auf 32-bit Webhosting-Servern zu falschen API-Ergebnissen
* Fehlerbehebung: In speziellen Fällen lieferte Amazon's API "png"-Bilder zurück, was wiederum zur fehlerhaften Darstellung von Produktbildern führte
* Fehlerbehebung: Hinzufügen des Super-URL-Parameters führte zu fehlerhaften "Warenkorb"-Links
* Fehlerbehebung: Im Admin-Bereich wurde fälschlicherweise PHP 5.3, anstatt 5.6, als Mindestvoraussetzung ausgegeben
* WordPress v4.9.1 Kompatibilität

= Version 3.6.7 (5. November 2017) =
* Fehlerbehebung: Erneuern des Caches funktionierte nach dem letzten Update nicht mehr korrekt
* Fehlerbehebung: Fehlende "jquery-ui-sortable" Abhhängigkeit für die Admin-Skripte
* Ab sofort wird mind. PHP v5.6 vorausgesetzt (v7.0+ empfohlen)

= Version 3.6.6 (31. Oktober 2017) =
* Neu: Shortcode-Attribut "tracking_id" kann nun ebenfalls auf Vergleichstabellen angewandt werden
* Neu: Shortcode-Attribut "keywords" hinzugefügt, um "Super-URLs" zu generieren
* Neu: "Super-URL"-Parameter wird bei Keyword-basierten Bestseller-Listen automatisch übergeben
* Verbesserung: Optimierung und Reduzierung der "AMP" CSS-Styles
* Verbesserung: Optimierung der Ausgabe von Produktbildern in den folgenden Templates: vertical, widget-small
* Verbesserung: Optimierung der Aktualisierungs-Routine, um dynamisch die Anzahl der zu erneuernden Produkten/Listen zu erhöhen
* Fehlerbehebung: In speziellen Fällen lieferte Amazon's API "png"-Bilder zurück, was wiederum zur fehlerhaften Darstellung von Produktbildern führte
* Fehlerbehebung: Die Filter-Funktion lieferte nicht die korrekten Ergebnisse zurück
* Fehlerbehebung: Filter "offer" enthielt unter Umständen auch nicht reduzierte Produkte
* Fehlerbehebung: Die Sortierungs-Funktion lieferte nicht die korrekten Ergebnisse zurück
* Fehlerbehebung: Die Parameter "filter_items" und "order_items" stellten nicht die gewünschte Anzahl an Produkten bereit
* WordPress v4.8.3 Kompatibilität
* Die Plugin-Updater-Klasse wurde auf die Version 1.6.15 aktualisiert
* Folgende Templates wurden angepasst: /products/vertical.php

= Version 3.6.5 (9. Oktober 2017) =
* Neu: Shortcode-Attribut "image_align" hinzugefügt, um einzelne Produktbilder den Text umfließen zu lassen (Werte "left" & "right")
* Neu: Vergleichstabellen können nun so konfiguriert werden, dass die erste Spalte ausgeblendet wird
* Neu: Platzhalter %price% kann nun im Button-Text verwendet werden
* Neu: Buttons können nun über die Plugin-Einstellungen ausgeblendet werden
* Verbesserung: Die erste Spalte einer Vergleichstabelle wird nun automatisch ausgeblendet, wenn keine Zeilen-Beschriftungen eingegeben wurden
* Verbesserung: "ribbon.php" wurde aus dem Templates-Ordner entfernt und wird fortan wieder direkt über die internen Plugin-Funktionen ausgegeben
* Verbesserung: Die Eingabe von Werten in Widgets wurde optimiert
* Verbesserung: Die Eingabe von Zugangsdaten für die Amazon API wurde optimiert
* Verbesserung: Die Übergabe einer abweichenden Tracking-ID (auf Shortcode-Basis) wurde optimiert
* Verbesserung: Ab sofort kann innerhalb des Button-Textes HTML verwendet werden
* Fehlerbehebung: Preisdifferenz eines bestimmten Produktes wurde behoben
* Fehlerbehebung: Geo-Targeting und Click-Tracking wurde nicht korrekt auf die Vorschauschilder und eigenen Texte angewandt (Vergleichstabellen)
* Fehlerbehebung: "Fatal error: Cannot unset string offsets in /includes/aawp/class.aawp-db-products.php on line 593"

= Version 3.6.4 (25. September 2017) =
* Verbesserung: Ausgabe von Produktbildern innerhalb der Vergleichstabellen wurde optimiert
* Fehlerbehebung: Einstellung "Bild-Größe" funktionierte nicht
* Fehlerbehebung: Auf der Support-Seite wurde eine ältere Plugin-Version ausgegeben, wie aktuell installiert
* Die gekürzten Affiliate Links wurden entfernt, um mit den aktualisierten Amazon-Bedingungen konform zu bleiben (siehe https://partnernet.amazon.de/promotion/whatschanging, 1. Oktober 2017)

= Version 3.6.3 (21. September 2017) =
* Verbesserung: Generierung der Produktbeschreibungen wurde optimiert
* Verbesserung: Sammeln der Produktbilder wurde optimiert
* WordPress v4.8.2 Kompatibilität

= Version 3.6.1 (19. September 2017) =
* Verbesserung: Beim Wechsel des Amazon-Stores werden nun die Plugin-relevanten Datenbank-Tabellen geleert
* Fehlerbehebung: Anstatt des Listenpreises, wurde der aktuelle Verkaufspreis ausgegeben
* Fehlerbehebung: Title-Attribut des Buttons wurde nicht korrekt gesetzt
* Fehlerbehebung: Ausblenden von Produkten funktionierte nicht (Vergleichstabellen)
* Fehlerbehebung: In speziellen Fällen wurden die Produkt-Links nicht gesetzt
* Fehlerbehebung: In speziellen Fällen wurde der Amazon-Button nicht ausgegeben
* Fehlerbehebung: In speziellen Fällen wurden die Produktbeschreibung nicht ausgegeben
* Fehlerbehebung: Bei Verwendung von Amazon.co.jp wurden die Produktbilder fehlerhaft ausgegeben
* Fehlerbehebung: Bei Verwendung von Amazon.co.jp wurden die Produktpreise fehlerhaft ausgegeben
* Fehlerbehebung: "Division by zero in class.aawp-product.php on line 263"

= Version 3.6.1 (14. September 2017) =
* Verbesserung: Optimierung der durchzuführenden Aufgaben nach dem Aktualisieren auf eine neue Plugin-Version
* Verbesserung: Die Datenbank-Tabellen können nun über den Admin-Bereich "Support" geleert werden
* Fehlerbehebung: Bei Verwendung des Tabellen-Typs "Bewertungen" wurde zweimal die entsprechende Beschriftung ausgegeben (Vergleichstabellen)
* Fehlerbehebung: Die Field-Werte "percentage_saved" und "amount_saved" lieferten irrtümlicherweise den Verkaufspreis zurück
* Fehlerbehebung: "Fatal error: Uncaught Error: Class 'AAWP_DB_Lists' not found in install.php"

= Version 3.6.0 (13. September 2017) =
* Neu: Einführung der neuen Platzhalter %post_title%, %page_title%, %post_category%, die in Kombination mit Bestseller-Keyword-Suchen verwendet werden können
* Verbesserung: Geschwindigkeit beim Anlegen/Auslesen von Produkten/Listen aus der Datenbank wurde optimiert
* Fehlerbehebung: Probleme in Verbindung mit der Datenverwaltung wurden behoben
* Fehlerbehebung: Beim Überschreiben des Typen "custom_text" mit "custom_html", wurde die Eingabe nicht gespeichert (Vergleichstabellen)
* Fehlerbehebung: Backslashes werden nun nicht mehr aus dem "Eigenen CSS" entfernt
* Die Datenverwaltung von Produkten und Listen wurde komplett erneuert
* Kleinere Verbesserungen und Fehlerbehebungen

= Version 3.5.5 (31. August 2017) =
* Verbesserung: Im Hinweis-Text werden nun Shortcodes ausgeführt
* Vorbereitungen für das kommende Update v3.6

= Version 3.5.4 (23. August 2017) =
* Verbesserung: Das Erkennung von Google Analytics (im Rahmen des Click-Trackings) wurde optimiert
* Verbesserung: CSS der Produktbeschreibungen wurde optimiert, damit die Listenpunkte nicht mehr aus dem HTML-Container "ausbrechen" können
* Kleinere Verbesserungen und Fehlerbehebungen

= Version 3.5.3 (14. August 2017) =
* Verbesserung: Laden des "Eigenen CSS" wurde optimiert
* Verbesserung: Geotargeting ist nun für eingeloggte Administratoren deaktiviert
* Verbesserung: CSS zur mobilen Darstellung der Vergleichstabellen wurde optimiert
* Verbesserung: Hinweis bzgl. der Sterne-/Bewertungen in den Plugin-Einstellungen hinzufügt
* Fehlerbehebung: Nach dem letzten Update funktionierte das Geotargeting in speziellen Fällen nicht so, wie es sollte
* Fehlerbehebung: Durch einen Javascript-Fehler (media.js) konnte der Vergleichstabellen-Builder nicht ausgeführt werden

= Version 3.5.2 (10. August 2017) =
* Neu: Neue Einstellung hinzugefügt, um den Hinweis nach jedem Widget anzeigen zu lassen
* Fehlerbehebung: Nach dem letzten Update konnte es passieren, dass beim Speichern einer Vergleichstabelle ein Produkt rausgeflogen ist
* Fehlerbehebung: Bei der Ausgabe des Hinweises nach einer Vergleichstabelle, wurde der Platzhalter %last_update% nicht ersetzt

= Version 3.5.1 (9. August 2017) =
* Neu: Ergebnisliste der Produktsuche (Vergleichstabellen) gibt nun ebenfalls den Prime-Status aus
* Neu: Prime-Funktionalität ist nun ebenfalls für Amazon Indien und Mexiko freigeschalten
* Verbesserung: Bei Vergleichstabellen können ab sofort 30 Zeilen (zuvor 20) angelegt werden
* Verbesserung: CSS-Styles der Vergleichstabellen wurden optimiert
* Verbesserung: Einstellungen zum Hevorheben von Produkten einer Vergleichstabelle wurden optimiert
* Verbesserung: Handhabung der maximalen Grid-Größe wurde optimiert
* Verbesserung: Laden von CSS/Javascript-Dateien wurde optimiert
* Verbesserung: Ländererkennung der Geo-Targeting Funktionalität wurde optimiert
* Fehlerbehebung: Beim Platzieren von mehreren Vergleichstabellen auf einem Beitrag / einer Seite, wurden die CSS-Styles nicht korrekt angewandt
* Fehlerbehebung: Hinweis-Text wurde nach Vergleichstabelle nicht ausgegeben
* Kleinere Verbesserungen und Fehlerbehebungen
* Plugin-Übersetzungen wurden aktualisiert

= Version 3.5.0 (31. Juli 2017) =
* Neu: Vergleichstabellen (Builder)
* Neu: Template-Variablen
* Kleinere Verbesserungen und Fehlerbehebungen
* Plugin-Übersetzungen wurden aktualisiert

= Version 3.4.9 (10. Juli 2017) =
* Verbesserung: Optimierung der Produkt-Titel, die beim Geo-Targeting Modus "Produkt-Suche" verwendet werden
* Fehlerbehebung: Beim Platzierung von Buttons via Field-Shortcode, wurde das Geo-Targeting nicht korrekt angewandt
* Fehlerbehebung: In speziellen Fällen war der Link zur Produkt-Detailseite aufgrund von Sonderzeichen fehlerhaft

= Version 3.4.8 (25. Juni 2017) =
* Verbesserung: Um einen besseren Support gewährleisten zu können, ist die Fehlerprotokollierung nun standardmäßig aktiviert
* Fehlerbehebung: In speziellen Einzelfällen, wurde ein falsches Produktbild von der API verwendet
* Fehlerbehebung: Es wurde ein Fehler behoben, der zu gelegentlichen Verbindungsabbrüchen mit der API führte

= Version 3.4.7 (22. Juni 2017) =
* Neu: Template-Funktion "get_product_numbering()" hinzugefügt, um die Nummerierung (bzw. den Index) des aktuellen Produktes auszugeben
* Verbesserung: Optimierung der Ausgabe-Bedingungen des "Keine Produkte gefunden" Hinweises (um es Einsteigern einfacher zu machen)
* Verbesserung: Optimierung der CSS-Styles zur Darstellung der Produktbilder
* Verbesserung: Wenn das Plugin von der Amazon API getrennt wird, wird gleichzeitig ein Log-Eintrag erstellt
* Verbesserung: Wenn das Plugin von der Amazon API getrennt wird, versucht es selbständig, sich erneut zu verbinden
* Fehlerbehebung: Bei der Verwendung von Shortcodes in Text-Widgets, kam es in speziellen Fällen zu einer unschönen Ausgabe

= Version 3.4.6 (13. Juni 2017) =
* Verbesserung: Bei Verwenden der Einstellung Shortcode "Deaktiviert", gibt's nun im Frontend keine Ausgabe mehr, anstatt den eigentlichen Shortcode anzugeigen
* Fehlerbehebung: Entfernen von Test-Ausgaben und Optimierung der Test-Funktionen

= Version 3.4.5 (12. Juni 2017) =
* Verbesserung: Beim händischen Aktualisieren eines Produktes wird nun ebenfalls versucht, die Bewertungen zu aktualisieren
* Verbesserung: Die Speicherung von Listen wurde optimiert
* Verbesserung: Das Aktualisieren von Produkt-Bewertungen wurde optimiert
* Verbesserung: In Kombination mit browsenode="none", wurden Listen in speziellen Fällen nicht korrekt aktualisiert
* WordPress 4.8 Kompatibilitäts-Prüfungen

= Version 3.4.4 (23. Mai 2017) =
* Neu: Shortcode-Parameter "button_detail_rel" hinzugefügt, um Werte wie z.B. "nofollow" zu übergeben
* Verbesserung: In den Settings (Reiter "Lizenzierung) wird künftig eine Meldung erscheinen, wenn der Server "allow_url_fopen" nicht unterstützt
* Verbesserung: Ab sofort gibt der API-Status Auskunft darüber, wenn im Laufe der Zeit Probleme mit den API-Keys auftreten sollten
* Fehlerbehebung: Der Geo-Targeting Modus "Produktsuche" funktionierte außerhalb der Standard-Produktboxen nicht korrekt
* Fehlerbehebung: Der Shortcode-Parameter browsenode="none" lieferte nicht die erwarteten Ergebnisse
* Fehlerbehebung: Bei Verwendung von "order_items", wurde in speziellen Fällen nicht die korrekte Anzahl an Produkten zurückgeliefert
* Fehlerbehebung: "PHP Notice: Array to string conversion in /aawp/templates/products/list.php on line 25"

= Version 3.4.3 (9. Mai 2017) =
* Neu: Produktboxen können nun mit dem Shortcode-Attribut float="left" (oder "right") den Text umfliessen lassen; Empfohlene Templates: vertical (Standard), list, widget-vertical, widget-small
* Neu: Bei Verwendung des "table"-Templates kann die Spalte  "Preise" mit dem Shortcode-Attribut price="none" ausgeblendet werden
* Neu: Bei Verwendung des Field-Shortcodes "thumb", kann die Bildbreite/-Höhe festgelegt werden: z.B. image_width="150", image_height="150"
* Neu: Das Label für Bestseller, Neuerscheinungen und Angebote kann ab sofort mit folgenden Shortcode-Attributen ausgeblendet werde: ribbon="none" / sale_ribbon="none"
* Verbesserung: Die Plugin-Einstellungen rund um die Ausgabe der Preisreduzierungen wurden komplett erneuert
* Verbesserung: Für die Geo-targeting Funktionalität kann als Link-Ziel zwischen "Produktsuche" (neuer Standard) und "Produktdetails" gewählt werden
* Verbesserung: Über die Plugin-Einstellungen (Reiter "Allgemein") kann das Ausführen der Shortcodes deaktiviert werden
* Verbesserung: Die Bereinigung der Shortcode-Ausgabe wurde optimiert
* Verbesserung: Die CSS-Styles der Thumbnails, bei Verwendung der Templates "vertical" und "widget-small", wurde optimiert
* Fehlerbehebung: Das Grid-Template wurde überschrieben, wenn in den Plugin-Einstellungen ein abweichendes Template als Standard festlegt war
* Fehlerbehebung: Für Produkte mit einem Rabatt im niedrigen Cent-Bereich, wurde die Preisreduzierung fehlerhaft ausgegeben
* Folgende Templates wurden angepasst: amp.php, /products/horizontal.php, /products/list.php, /products/vertical.php, /products/widget-vertical.php

= Version 3.4.2 (24. April 2017) =
* Neu: Prüfung und Hinweis der aktuellen Plugin-Version hinzugefügt
* Verbesserung: Bei Verwendung des "list"-Templates, kann der Teaser nun ebenfalls über description="none" (normalerweise über teaser="none") ausgeblendet werden
* Verbesserung: CSS-Styles zur Unterstützung des Thrive Content Builder hinzugefügt
* Verbesserung: Kleinere allgemeine und Template-bezogene CSS-Optimierungen
* Verbesserung: Erneutes Entfernen des "editorial review" zur Entlastung der Datenbank
* Fehlerbehebung: Produkt- und Listen-Posts waren ungewollt über das Frontend aufzurufen und konnten ebenfalls in Sitemaps auftauchen
* Fehlerbehebung: Bewertungen waren nur in Ganzzahlen verfügbar und führten dadurch zu inkorrekten Sterne-Bewertungen
* Fehlerbehebung: In manchen Fällen wurde ein verfügbares Plugin-Update nicht korrekt angezeigt
* Fehlerbehebung: Bei Verwendung der Field-PHP-Funktionen, wurde das Prime Logo nicht korrekt zurückgegeben
* Fehlerbehebung: Bei Verwendung der Einstellung "Disclaimer am Seitenende", wurden platzierte Shortcodes in speziellen Fällen nicht erkannt
* Fix: PHP Hinweis "Use of undefined constant in ... sysinfo.php on line 71" wurde behoben
* Die Plugin-Updater-Klasse wurde auf die Version 1.6.12 aktualisiert

= Version 3.4.1 (27. März 2017) =
* Fehlerbehebung: Das erste Produktbild wurde nicht von der API abgerufen
* Fehlerbehebung: Icons innerhalb der Buttons wurden nicht ausgegeben
* Fehlerbehebung: Der "Einstellungen"-Link auf der Plugin-Übersicht war falsch
* Fehlerbehebung: Bei Verwendung des Shortcode-Attributes "image" und Übergabe einer Zahl, wurde das Produktbild fehlerhaft dargestellt
* Fehlerbehebung: Das über die Plugin-Einstellungen festzulegende Link-Ziel der Sterne-Bewertungen, führte bei Auswahl von "Bewertungen" fälschlicherweise zur Wishlist
* Fehlerbehebung: Bei Verwendung der Field-PHP-Funktion in Kombination mit der Produktbeschreibung konnte kein Array zurückgegeben werden

= Version 3.4 (21. März 2017) =
* Neu: Einführung der neuen Administrations-Seiten
* Neu: Einführung der neuen Produkt- und Listenverwaltung
* Neu: Das Standard-Produktbild kann nun ganz einfach über die Produktverwaltung festgelegt werden (weitere solcher Funktionen folgen!)
* Neu: Die Hinweis "Keine Produkte gefunden" kann nun über die Plugin-Einstellungen (Reiter "Funktionen") konfiguriert werden
* Neu: Der Text des Bestseller-Labels kann nun über die Plugin-Einstellungen (Reiter "Funktionen") konfiguriert und via Shortcode ("ribbon_text") überschrieben werden
* Neu: Der Text des Neuerscheinungen-Labels kann nun über die Plugin-Einstellungen (Reiter "Funktionen") konfiguriert und via Shortcode ("ribbon_text") überschrieben werden
* Neu: Produkte können nun ebenfalls nach Anzahl der abgegebenen Bewertungen (orderby="reviews") sortiert werden
* Neu: Bei Verwendung der PHP-Field-Funktionen kann nun der Zeitstempel der letzten Aktualisierung (value="timestamp") abgerufen werden
* Neu: Der Field-Wert "editorial_review" ist nun wieder verfügbar
* Verbesserung: Das "Säubern" der Shortcode-Ausgabe wurde optimiert und muss über die separate Einstellung (Reiter "Allgemein") aktiviert werden
* Verbesserung: Ab sofort prüft das Plugin selbstständig und regelmäßig, ob alle notwendigen Service-Events aktiviert sind
* Verbesserung: Tracking IDs werden nicht mehr in der Datenbank gespeichert und können dadurch sofort ausgetauscht werden
* Verbesserung: Die Abfrage von Produkten über die API, wurde im Hinblick auf nicht (mehr) verfügbare ASINs optimiert
* Verbesserung: Die Verwaltung und das Erneuern des Caches wurde optimiert
* Verbesserung: Um bei der Deinstallation des Plugis alle Daten und Einstellungen zu löschen, muss über die Plugin-Einstellungen eine Checkbox aktiviert werden
* Fehlerbehebung: In Einzelfällen führte das "Säubern" der Shortcode-Ausgabe dazu, dass der Seiteninhalt nicht mehr korrekt dargestellt werden konnte
* Kleinere Verbesserungen und Fehlerbehebungen

= Version 3.3.8 (31. Januar 2017) =
* Neu: Amazon Icons (in schwarz und weiß) können ab sofort in Buttons verwendet werden
* Verbesserung: Handhabung der AMP-Styles wurde optimiert
* Verbesserung: Cache-Verwaltung wurde optimiert
* Fehlerbehebung: In bestimmten Fällen war die Produkt-Reihenfolge innerhalb von Listen inkorrekt
* Fehlerbehebung: Das ausgewählte Euro-Währungsformat (EUR vs. €) wurde bei Produkten mit Preis-Varianten nicht angewandt
* Fehlerbehebung: "PHP Warning: Invalid argument supplied for foreach() in ... cache-handler.php on line 252"
* Kleinere CSS-Optimierungen und -Korrekturen
* Die Plugin-Updater-Klasse wurde auf die Version 1.6.10 aktualisiert

= Version 3.3.7 (26. Januar 2017) =
* Verbesserung: Die Filter-Attribute "offer" und "available" können nun zusammen verwendet werden: z.B. filter="price" filterby="offer,available"
* Verbesserung: Optimierung der Ausgabe von Produktboxen mit fehlendem Verkaufspreis
* Fehlerbehebung: Das letzte Update (3.3.6) führte auf Webservern mit einer älteren PHP-Version (vor 5.5) zu einem fatalen PHP-Fehler. Sorry dafür! :-(
* Fehlerbehebung: "Can't use method return value in write context in ... class.aawp-functions.php on line 1555"
* Fehlerbehebung: Der Tabellenkopf "Preis" im Tabellen-Template wurde nicht korrekt ausgegeben

= Version 3.3.6 (25. Januar 2017) =
* Neu: Die Standard-Größe des Produkt-Vorschaubildes kann nun über die Plugin-Einstellungen ausgewählt werden
* Verbesserung: Die CSS-Styles bei Verwendung des "horizontal"-Templates, in Verbindung mit großen Produktbildern, wurden optimiert
* Verbesserung: Der Filter zur Ausgabe von "nur verfügbaren Produkten" kann nun wie folgt aktiviert werden: filter="price" filterby="available"
* Verbesserung: Wenn ein Produkt nicht über die API verfügbar ist, wird nun eine entsprechende Meldung ausgegeben
* Verbesserung: Über die Plugin-Einstellungen (Reiter "Support") kann eingesehen werden, ob die "Cron Events" korrekt laufen
* Fehlerbehebung: Neuerscheinungen-Listen mit nur 1 Produkt wurden nicht korrekt ausgegeben
* Fehlerbehebung: Bereits in der Datenbank zwischengespeicherte Listen, gaben die Produkte in einer falschen Reihenfolge aus
* Fehlerbehebung: In einzelnen Fällen wurde in Produktboxen ein Rabatt ausgegeben, welcher auf der Amazon-Produktseite nicht sichtbar war
* Fehlerbehebung: Das Click-Tracking konnte nicht korrekt ausgeführt werden, wenn der Google Analytics Code durch ein Yoast-Plugin eingefügt wurde
* Fehlerbehebung: Das Umschreiben der URLs (in Verbindung mit der Geotargeting-Funktionalität) wurde optimiert
* Fehlerbehebung: "PHP Warning: file_get_contents(): http:// wrapper is disabled in the server configuration by allow_url_fopen=0"
* Kleinere Verbesserungen und Fehlerbehebungen
* Die Plugin-Updater-Klasse wurde auf die Version 1.6.9 aktualisiert

= Version 3.3.5 (25. Dezember 2016) =
* Fehlerbehebung: Plugin-Updates wurden nicht korrekt angezeigt

= Version 3.3.4 (23. Dezember 2016) =
* Neu: Eigener Shortcode ("amazon_last_update" bzw. "aawp_last_update") zur Ausgabe des Datums der letzten Aktualisierung an beliebiger Stelle
* Neu: Eigener Shortcode ("amazon_disclaimer" bzw. "aawp_disclaimer") zur Ausgabe des Hinweis-Textes an beliebiger Stelle
* Neu: Die Widget-Templates ("widget-vertical" und "widget-small") können nun ebenfalls im Haupt-Inhaltsbereich verwendet werden
* Verbesserung: Verlinkte Datenfelder haben nun die CSS-Klasse "aawp-field-link"; zusätzlich kann über "link_class" eine eigene Klasse vergeben werden
* Verbesserung: Die Amazon API liefert die Bild-URLs seit Neuestem standardmäßig mit https aus
* Fehlerbehebung: Der Link-Shortcode konnte (bei Version 3.3.3) gelegentlich das Produkt nicht korrekt zurückgegeben
* Fehlerbehebung: Beim Geo-Targeting wurde die Tracking-ID an bereits maskierte "amnz.to"-Links angehängt
* Fehlerbehebung: Kurzzeitig war der Reiter "Lizenzierung" in den Plugin-Einstellungen doppelt vorhanden
* Die Plugin-Updater-Klasse wurde auf die Version 1.6.7 aktualisiert

= Version 3.3.3 (19. Dezember 2016) =
* Neu: Die Ausgabe der Datenfelder kann nun mit dem Shortcode-Attribut format="linked" verlinkt werden
* Neu: Das Shortcode-Attribut "button_detail" kann nun auch mit Listen verwendet werden
* Neu: Shortcode-Attribut "order_items" hinzugefügt, um (in Kombination mit "items") die Anzahl der zu sortierenden Produkte zu erhöhen
* Neu: Das Plugin ist nun auf Französisch und Italienisch verfügbar (Übersetzungen leider noch nicht komplett)
* Verbesserung: Die Berechnung des Angebots-Preises wurde optimiert
* Verbesserung: Bei Verwendung von PageBuilder Widgets kann nun das Template gewählt werden
* Verbesserung: Die CSS-Styles bei Verwendung des "vertical"-Templates, in Verbindung mit dem Detail-Button, wurden verbessert
* Verbesserung: Die Handhabe des Zeitstempels zur "Letzten Aktualisierung" wurde verbessert
* Verbesserung: Tiefgreifende Optimierungen zum Erneuern des Produkt- und Listen-Caches
* Verbesserung: Kleine Verbesserung der CSS-Styles des AMP-Templates
* Fehlerbehebung: Bei Verwendung von "button_detail" wird nun kein "/" mehr ans Ende angefügt
* Fehlerbehebung: Der Hinweis am Ende des Inhaltsbereiches wurde nicht ausgegeben, wenn lediglich Widgets aktiv waren
* Fehlerbehebung: In bestimmten Fällen beinhaltete die Beschreibung von Büchern die Textausgabe "Array"
* Fehlerbehebung: Bei der Verwendung von orderby="amount_saved" trat ein fataler PHP-Fehler auf
* Fehlerbehebung: Fehlerhafter SQL-Syntax bei Verwendung von Suchbegriffen, die ein Apostroph beinhalteten
* Fehlerbehebung: Bei Verwendung des Link-Shortcodes wurde das Produkt nicht korrekt zurückgegeben
* Fehlerbehebung: Bei Verwendung des Link-Shortcodes trat die Fehlermeldung "PHP Notice: Undefined offset" auf
* Fehlerbehebung: "PHP Notice: Trying to get property of non-object in class.aawp-api.php"

= Version 3.3.2 (21. November 2016) =
* Neu: Extra Template und CSS-Datei für die Ausgabe von Accelerated Mobile Pages (AMP) hinzugefügt
* Neu: Der Link des Amazon Prime Logos kann nun über die Plugin-Einstellungen entfernt werden
* Neu: Die "Angebot"-Markierung kann nun über die Plugin-Einstellungen entfernt werden
* Neu: Eigener Cronjob zum Aktualisieren der Produktbewertungen hinzugefügt
* Verbesserung: Produktbewertungen werden separat aktualisiert und verwenden eine alternative Quelle
* Verbesserung: Das Plugin automatisch, ob die Seite ein SSL-Zertifikat verwendet
* Verbesserung: Ab sofort werden die "Warenkorb"-Links nur noch auf Buttons angewandt
* Verbesserung: Die Ausgabe des eigenen CSS wurde optimiert
* Fehlerbehebung: Ein Problem bei der Verwendung von Geotargeting mit Amazon.com wurde behoben
* Fehlerbehebung: Zu viel CSS führte zu der Meldung "The author stylesheet specified in tag 'style amp-custom' is too long" im Rahmen der AMP-Validierung
* Fehlerbehebung: Bei Verwendung des "Thrive Content Builder" wurde das vertikale Template nicht korrekt dargestellt
* Fehlerbehebung: In manchen Fällen gab es unter Chrome einen kleinen Schönheitsfehler bei der Verwendung des Tabellen-Templates
* Fehlerbehebung: Eigene Templates, die zuvor über die Plugin-Einstellungen eingegeben wurden, wurden auch ausgeführt, wenn nicht mehr "Eigenes Template" ausgewählt war
* Fehlerbehebung: Preiserhöhungen führten zur einer falschen Darstellung
* Fehlerbehebung: Das Template "widget-small" wurde nicht korrekt ausgewählt
* Kleinere Verbesserungen und Korrekturen

= Version 3.3.1 (9. November 2016) =
* Kleinere Verbesserungen und Korrekturen
* Fehlerbehebung: Bei den Grids wurde das falsche Template ausgewählt, was zu unschönen Darstellungen geführt hat
* Fehlerbehebung: Bei der Verwendung von Shortcodes in Text-Widgets, wurde das falsche Template ausgewählt
* Fehlerbehebung: Der Field-Wert "reviews" bzw. "rating_count" gab das Ergebnis nicht zurück

= Version 3.3.0 (7. November 2016) =
* Neu: Ab sofort kann der Filter auch auf Box-Shortcodes angewandt werden
* Neu: Fields-Parameter "salesrank" hinzugefügt, um den aktuellen Verkaufsrang eines Produktes - innerhalb seiner Hauptkategorie - zurückzugeben
* Neu: "Smart Caching"-Funktionalität hinzugefügt, die in den Plugin-Einstellungen (Reiter "Allgemein") aktiviert werden kann
* Fehlerbehebung: Das Shortcode-Attribut "store" hat die Links zu Amazon Prime nicht korrekt aktualisiert
* Fehlerbehebung: In den Plugin-Settings (Reiter "Funktionen") wurden fälschlicherweise noch die alten Templates verwendet
* Fehlerbehebung: "Memory exhausted" Problem wurde behoben
* Fehlerbehebung: "Error while sending QUERY packet. PID=XXXXX in /wp-includes/wp-db.php on line XXXX" Problem wurde behoben

= Version 3.2.2 (30. Oktober 2016) =
* Neu: Fields-Parameter "format" hinzugefügt, um den numerischen Wert von Preisen zurückzugeben
* Neu: Fields-Parameter "raw" hinzugefügt, um die Produktbeschreibung als PHP Array zurückzugeben
* Verbesserung: Berechnung der Angebots-Preise wurde optimiert
* Verbesserung: CSS-Styles der Sterne-Bewertungen wurden optimiert
* Verbesserung: Das CSS-Beispiel in den Plugin-Einstellungen wurde aktualisiert
* Verbesserung: CSS-Styles des Tabellen-Templates wurden optimiert
* Fehlerbehebung: Bei der Verwendung der Field-Template-Funktionen wurde ein Fehler ausgeworfen, wenn keine Verbindung zur API bestand
* Fehlerbehebung: AMP-Styles wurden nicht korrekt geladen

= Version 3.2.1 (26. Oktober 2016) =
* Neu: Kompatibilitäts-Modus für Skripte
* Neu: Shortcode-Attribut "select" hinzugefügt, um bestimmte Produkte einer Liste zu selektieren
* Verbesserung: CSS-Styles des Tabellen-Templates wurden optimiert
* Verbesserung: Die Weiterverarbeitung der Shortcode-Werte wurde optimiert, um Probleme mit Sonderzeichen zu vermeiden
* Verbesserung: Das Shortcode-Attribut star_rating="none" kann nun dafür verwendet werden, um die Spalte "Bewertungen" des Tabellen-Templates auszublenden
* Verbesserung: Der Field-Wert "reviews" ersetzt den bisher verwendeten Wert "rating_count"
* Fehlerbehebung: Bei Verwendung der Field PHP-Funktion wurde der Button nicht korrekt ausgegeben
* Fehlerbehebung: Es trat ein Fehler auf, wenn Buttons über den Field-Shortcode eingefügt wurden

= Version 3.2.0 (23. Oktober 2016) =
* Neu: Geotargeting
* Neu: Template zur Darstellung in Listenansicht
* Neu: Template zur Darstellung in Grids (mehrspaltig nebeneinander)
* Neu: Eigene Widgets für Boxen, Bestseller und Neuerscheinungen
* Neu: Template mit kleinerer Darstellung für Widgets
* Neu: Click Tracking unterstützt nun auch Google Tag Manager
* Neu: Mehrere Auswahlmöglichkeiten für Icons der Sterne-Bewertungen
* Neu: Shortcode-Attribut "class" hinzugefügt, um dem Produkt-Container eine eigene Klasse zu übergeben
* Neu: Shortcode-Attribut "star_rating_link" hinzugefügt, zum Deaktivieren/Überschreiben des Links bei Sterne-Bewertungen
* Neu: Shortcode-Attribut "image_title" hinzugefügt, um das HTML-Attribut "title" bei Bildern festzulegen
* Neu: Shortcode-Attribut "rating" hinzugefügt, zum manuellen Setzen einer Bewertung zwischen 1 und 5
* Neu: Über die Plugin-Einstellungen kann die Ausführung von Shortcodes in Text-Widgets, sowie der Beschreibung von Kategorien/Taxonomien aktiviert werden
* Neu: "Warenkorb-Links" (90-Tage-Cookie)
* Verbesserung: Templating komplett erneuert
* Verbesserung: Caching komplett erneuert
* Verbesserung: Das Abrufen und Verwalten von Bewertungen wurde optimiert
* Verbesserung: Tabellen-Templates wurden optimiert
* Verbesserung: In den Plugin-Einstellungen wird der Reiter "Funktionen" nun übersichtlicher dargestellt
* Verbesserung: Der Platzhalter "last_update" kann nun auch am Seitenende verwendet werden
* Verbesserung: Über die Plugin-Einstellungen kann nun festgelegt werden, ob die Produktbeschreibung auf Smartphones ausgeblendet werden soll
* Verbesserung: Handhabung der Plugin-Skripte wurde optimiert
* Verbesserung: Shortcode-Attribut "tracking_id" funktioniert nun auch mit langen Affiliate-Links
* Fehlerbehebung: Manche Produktbeschreibungen zeigten "0"
* Fehlerbehebung: Verwendung des Box-Shortcodes mit mehr als 10 ASINs führte zu einem Fehler
* Jede Menge kleinerer Verbesserungen
* !!! Vielen Dank für euer zahlreiches Feedback !!!

= Version 3.1.8 (5. September 2016) =
* Verbesserung: Abfrage der Produktbewertungen wurde optimiert

= Version 3.1.7 (15. August 2016) =
* Verbesserung: Gekürzte Affiliate-Links verwenden nun das "https" anstatt wie bisher "http"
* Fehlerbehebung: Die Preise bei Verwendung des Amazon.co.jp Shops wurden falsch ausgegeben
* Fehlerbehebung: Über die Plugin-Einstellungen konnte das Tabellen-Template für den Box-Shortcode nicht korrekt ausgewählt werden
* Fehlerbehebung: Das Admin-Menü für die Plugin-Einstellungen wurde bei älteren WordPress-Versionen nicht angezeigt

= Version 3.1.6 (10. Juli 2016) =
* Neu: Shortcode-Attribut "price" hinzugefügt, um den Verkaufspreis zu überschreiben bzw. selbst zu setzen
* Neu: Um den Verkaufspreis auszublenden, übergib dem "price" Shortcode-Attribut den Wert "none"
* Neu: Über die Plugin-Einstellungen (Reiter "Funktionen") kann nun der Anzahl der Produkte in Listen festgelegt werden
* Neu: Über die Plugin-Einstellungen (Reiter "Ausgabe") kann der "Preis nicht verfügbar" Hinweis ausgeblendet werden
* Verbesserung: Produkte mit mehreren Variationen liefern nun bessere Ergebnisse
* Fehlerbehebung: Eine 4-stelligen Anzahl an Bewertungen wurde falsch ausgegeben
* Fehlerbehebung: "Warning: Invalid argument supplied for foreach() in .../includes/aawp/admin-actions.php on line 26"

= Version 3.1.5 (5. June 2016) =
* Verbesserung: Die Preisangabe von Amazon (Prime) Videos wurde optimiert
* Fehlerbehebung: Das Prime Logo wurde nicht korrekt ausgegeben

= Version 3.1.4 (3. Juni 2016) =
* Verbesserung: Beschreibung und Preisangabe für Filme/Serien auf Amazon Video wurde optimiert
* Fehlerbehebung: Das Leeren des Caches hat nicht alle "Transienten" gelöscht
* Fehlerbehebung: In bestimmten Fällen wurde die Sterne-Bewertung nicht korrekt ausgegeben
* Fehlerbehebung: Bei der Aktualisierung des "filter_items"-Wertes wurde der Cache nicht korrekt erneuert
* Fehlerbehebung: Die Filter-Funktion lieferte in bestimmten Fällen ein falsches Ergebnis

= Version 3.1.3 (29. Mai 2016) =
* Neu: WP Filter zum Ersetzen der Meldung "Keine Produkte gefunden" hinzugefügt
* Verbesserung: Click-Tracking funktioniert nun ebenfalls bei den Datenfeldern (Fields)
* Verbesserung: Click-Tracking wird nicht mehr aktiv beim Klicken auf den Details-Button
* Verbesserung: Wenn das Produktbild nicht vorhanden ist, jedoch ein Bild aus der Produkt-Galerie, wird dieses verwendet
* Fehlerbehebung: Bei Verwendung des Filters wurde die Anzahl der Produkte nicht korrekt zurückgegeben, wenn das Attribut "filter" leer war

= Version 3.1.2 (26. Mai 2016) =
* Neu: Klick-Tracking - via Google Analytics oder Piwik - für Affiliate-Links hinzugefügt. Kann über die Plugin-Einstellungen aktiviert werden.
* Neu: Amazon-Logo für den Link-Shortcode hinzugefügt. Kann über die Plugin-Einstellungen ausgewählt werden.
* Neu: Shortcode-Attribut "star_rating" hinzugefügt, welches den Wert "none" akzeptiert, um die Sterne-Bewertung auszublenden
* Neu: Shortcode-Attribut "reviews" hinzugefügt, welches den Wert "none" akzeptiert, um die Anzahl der Bewertungen auszublenden
* Neu: Datenfeld-Werte "asin", "ean" und "isbn" hinzugefügt
* Verbesserung: Caching optimiert, im Hinblick auf Drittanbieter-Caching-Plugins und "Object Cache"
* Verbesserung: Filter-Funktionalität erweitert; Möglichkeiten zum Filtern nach Preis, sowie mehreren Suchbegriffen im Titel hinzugefügt
* Fehlerbehebung: Could not resolve host: webservices.amazon.de
* Fehlerbehebung: PHP implode warning: class.aawp-api.php
* Fehlerbehebung: Kostenpflichtige eBooks wurden mit dem Preis 0,00 EUR ausgegeben
* Fehlerbehebung: Doppelte Anführungszeichen innerhalb von HTML title/alt-Attributen verursachten Markup-Fehler
* Fehlerbehebung: Die Übersichtstabelle der verschiedenen Affiliate-Links in den Plugin-Einstellungen wurde im Chrome mit niedrigen Auflösungen fehlerhaft dargestellt
* !! WICHTIG: Bitte eigene Templates aktualisieren !!

= Version 3.1.1 (28. April 2016) =
* Fehlerbehebung: Weiße Seite nach dem letzten Update; das Problem trat nur bei einer bestimmten Servereinstellung auf
* Fehlerbehebung: Leerer Text bei der Button-Vorschau direkt nach der Plugin-Aktivierung
* Fehlerbehebung: PHP Notice "Undefined index: status"
* Fehlerbehebung: PHP Notice "Undefined property: $items_amount"

= Version 3.1.0 (28. April 2016) =
* Neu: "Amazon.com.mx" als neues Land hinzugefügt
* Neu: In den Plugin-Einstellungen werden hilfreiche Links zur Anmeldung der Amazon API ausgegeben
* Neu: Filterung von Listen hinzufügt
* Verbesserung: Der Shortcode "aawp" ist ab sofort immer verfügbar, der Shortcode "amazon" kann wie bisher aktiviert bzw. verwendet werden
* Verbesserung: CSS-Klasse für den Hinweis "Preis aktuell nicht verfügbar" hinzugefügt
* Verbesserung: Die Einstellungen zu den Sterne-Bewertungen, sowie der Anzahl an Bewertungen wurde optimiert
* Verbesserung: Die Überprüfung der API-Zugangsdaten wurde optimiert
* Fehlerbehebung: Überprüfung der API-Zugangsdaten für Amazon.it war fehlerhaft
* Fehlerbehebung: Unter bestimmten Umständen verlinkten die Produktboxen auf die aktuelle Seite, anstatt auf die Amazon Produktseite


= Version 3.0.06 (16. April 2016) =
* Verbesserung: Konfiguration und Abrufen der Bewertungen wurde optimiert
* Fehlerbehebung: "Unsupported operand types"

= Version 3.0.05 (10. April 2016) =
* Neu: Datenfeld "editorial_review" zur Ausgabe der erweiterten Beschreibung hinzugefügt
* Verbesserung: Mobile Darstellung der Produktboxen optimiert
* Verbesserung: Optimierung der Berechnung und Ausgabe von Preisreduzierungen
* Verbesserung: AMP lädt nun ebenfalls die eigenen Styles aus den Plugin-Einstellungen
* Fehlerbehebung: Das Entfernen von "!important"-Deklarationen im Rahmen der AMP-Styles funktionierte nicht
* Fehlerbehebung: HP Warning include() http:// wrapper is disabled in the server configuration
* Fehlerbehebung: FOLLOW_LOCATION

= Version 3.0.04 (28. März 2016) =
* Neu: Shortcode-Attribut "button" hinzugefügt, welches den Wert "none" akzeptiert, um den "Amazon Kaufen"-Button auszublenden
* Neu: Shortcode-Attribut "link_text" hinzugefügt, um für den Link-Shortcode einen eigenen Text zu setzen, oder ihn ganz auszublenden und nur das Icon auszugeben
* Neu: Shortcode-Attribut "link_overwrite" hinzugefügt, um die Produkt-URL zu überschreiben
* Verbesserung: Button-Styles wurden optimiert, um zu verhindern, dass der Text unterstrichen wird
* Fehlerbehebung: Bei eBooks wurde als Preis fälschlicherweise "nicht verfügbar" ausgegeben. Vorrübergehend wird gar kein Preis ausgegeben. Die Ausgabe der eBook-Preise ist bereits in der Entwicklung!
* Fehlerbehebung: Das Entfernen der "!important"-Deklarationen aus den AMP-Styles wurde nicht korrekt durchgeführt

= Version 3.0.03 (24. März 2016) =
* Neu: Die Reihenfolgen von mehreren Boxen, Bestseller- und Neuerscheinungen-Listen können nun neu geordnet werden
* Neu: Shortcode-Attribut "orderby" hinzugefügt, welches folgende Werte akzeptiert: title, price, amount_saved, percentage_saved, rating
* Neu: Shortcode-Attribut "order" hinzugefügt, welches folgende Werte akzeptiert: ASC (aufsteigend), DESC (absteigend). Standardwert ohne Eingabe ist DESC
* Neu: Shortcode-Attribut "description_text" hinzugefügt, um einen extra Text (Paragraph) unterhalb der Produktbeschreibungs-Liste auszugeben
* Neu: Über die Plugin-Einstellungen kann nun (für EURO-Länder) das Währungsformat ausgewählt werden: EUR oder €
* Neu: Über die Plugin-Einstellungen kann die AMP-Unterstützung aktiviert werden
* Neu: Das Template "box_table" wurde hinzugefügt und kann zur Anzeige von mehreren Boxen in einer Tabelle (analog zu den Bestsellern) verwendet werden
* Verbesserung: Die Einstellungen zu den Affiliate-Links wurde optimiert und die bisherigen langen URLs als Standardwert gesetzt (bitte anpassen, wenn du wieder die Kurz-URLs nutzen möchtest)
* Verbesserung: Die "!important"-Deklarationen wurden aus den AMP-Styles entfernt
* Fehlerbehebung: Bei einer Bewertungs-Anzahl über 999 wurden nur die letzten drei Ziffern ausgegeben
* Fehlerbehebung: Die Ursache für die Warnung "array_merge(): Argument #2 is not an array..." wurde ausfindig gemacht und das Problem behoben

= Version 3.0.02 (9. März 2016) =
* Neu: Datenfeld "prime" zur Ausgabe des Prime-Logos hinzugefügt (Voraussetzung: das entsprechende Produkt unterstützt den Service)
* Neu: Shortcode-Attribut "image" hinzugefügt, um das Produktbild zu überschreiben (eigene URL) oder eines der weiteren Bilder (max 5) auszuwählen: z.B. image="2"
* Neu: Shortcode "aawp_button_detail" hinzugefügt, der folgende Attribute (ähnlich dem Datenfeld "button_detail") akzeptiert: link, text, target, title, style
* Neu: Link zu den AAWP-Einstellungen in der Plugin-Übersicht hinzugefügt
* Verbesserung: Bei unterschiedlichen Produktvariationen wird der Verkaufspreises nun noch genauer angegeben
* Fehlende Übersetzungen für die Plugin-Einstellungen hinzugefügt, Bestehende aktualisiert

= Version 3.0.01 (7. März 2016) =
* Fehlerbehebung: Amazon API konnte keine Verbindung herstellen
* Fehlerbehebung: Datei "simple_html_dom.php" konnte nicht gefunden werden

= Version 3.0.0 (6. März 2016) =
* Neu: "Verbinden, "Verbindung trennen" und "Neu verbinden" Buttons in den Amazon API Einstellungen
* Neu: Unterstützung für Accelerated Mobile Pages (AMP), insofern das offizielle WordPress AMP Plugin verwendet wird: https://wordpress.org/plugins/amp/
* Neu: "Kurze" Affiliate-Links
* Neu: Die "langen" Affiliate-Links können über die Plugin-Einstellungen reaktiviert werden
* Neu: Shortcode-Attribut "image_link" hinzugefügt, um Thumbnail-Links zu überschreiben oder entfernen
* Neu: Der Titel-Zusatz (z.B. ein Sternchen *) kann nun (optional) ebenfalls auf die Thumbnail-Link-Titel angewandt werden
* Neu: Das Amazon Prime-Logo kann nun neben dem Verkaufspreis ausgegeben werden (insofern das entsprechende Produkt diesen Service unterstützt)
* Neu: Verdiene eine Extra-Provision mit der neuen Amazon Prime-Funktion, wenn ein Besucher auf das Logo klickt und sich für die kostenlose Probemitgliedschaft anmeldet
* Neu: Shortcode-Attribut "tracking_id" hinzugefügt, um die Tracking-ID zu überschreiben (funktioniert aktuell nicht bei den "langen" Affiliate-Links)
* Neu: Spanische Übersetzungen hinzugefügt (Danke an Hendrik!)
* Neu: PHP 7 Unterstützung
* Verbesserung: Die Beschreibungen von Produkten aus den folgenden Kategorien wurde optimierung: Schuhe, Musik, Filme und Prime Videos
* Verbesserung: Bei Produkten, die aktuell nicht verfügbar sind, wird nun ein Hinweis anstatt eines leeren Preisfeldes ausgegeben
* Verbesserung: Bei Produkten, die aktuell nur "gebraucht" verfügbar sind, wird nun ein Hinweis anstatt eines leeren Preisfeldes ausgegeben
* Verbesserung: Die Plugin-Einstellungen im Reiter "Support" wurden optimiert, um noch besser (und visuell) Rückmeldung über das WebHosting und fehlenden Erweiterungen geben zu können
* Verbesserung: Die Plugin-Einstellungen im Reiter "Amazon API" wurden optimiert und geben nun visuell Rückmeldung, wenn die API nicht verbunden ist
* Verbesserung: Die Übersetzungungen und Hinweise zur "Tracking ID" wurden überarbeitet, um Unklarheiten zu vermeiden
* Fehlerbehebung: Vereinzelt fehlten bei Produkten die Vorschaubilder
* Fehlerbehebung: Verbindungs-Probleme mit dem Hinweis "Amazon Product Advertising API is currently not available" wurden behoben
* Fehlerbehebung: Fehler-Hinweise, ausgehend von der Amazon API Bibliothek, wurden entfernt
* Fehlerbehebung: API-Routine-Checks wurden wieder entfernt, um Verbindungsprobleme zu vermeiden
* Fehlerbehebung: Versehentlich wurde der Titel-Zusatz ebenfalls im ALT-Tag der Bilder hinzugefügt
* Amazon API Bibliothek wurde ausgetauscht
* Unterstützung für PHP Versionen älter als 5.3 wurde entfernt
* Umbenennung des Plugin-Ordners und der Hauptdatei
* PHP-Template-Dateien wurden aktualisiert. Eigene Templates müssen geprüft und evtl. angepasst werden

= Version 2.1.05 (17. Januar 2016) =
* Neu: Field-Wert "rating_count" zur Ausgabe der Anzahl an Bewertungen hinzugefügt
* New: Bei der Verwendung des "Bestseller Table" Templates kann der Verkaufspreis nun ebenfalls ausgeblendet werde
* Verbesserung: Preisreduzierungen werden nicht mehr ausgegeben, wenn der Verkaufspreis ausgeblendet wird
* Verbesserung: Die Ausgabe der Meldung "Keine Produkte gefunden" wurde optimiert
* Verbesserung: Freiräume innerhalb der Produktboxen wurden reduziert und die Styles optimiert
* Fehlerbehebung: Bei Nichtereichbarkeit der Amazon Product Advertising API wurde eine Fehlermeldung ausgegbeen

= Version 2.1.04 (10. Januar 2016) =
* Neu: Verkaufspreis kann nun über die Plugin-Einstellungen ausgeblendet werden (Templates wurden aktualisiert!)
* Verbesserung: Hinweis für responsive Bestseller-Tabelle wurde über die relevante Tabelle verschoben
* Fehlerbehebung: Eigenes CSS wird nun auch ausgeführt, wenn sich auf der Seite nur Widgets befinden
* Fehlerbehebung: Anzahl der Beschreibungs-Listenpunkte konnte über die Plugin-Einstellungen nicht auf 0 gesetzt werden
* Plugin-Updater wurde aktualisiert

= Version 2.1.03 (29. Dezember 2015) =
* Fehlerbehebung: "Call to a member function find() on null" trat auf, wenn keine Produktbewertungen vorhanden sind
* Verbesserung: Erhöhte Wahrscheinlichkeit, Produktbilder von der Amazon API zu erhalten
* Verbesserung: Hinweis bzgl. "Wischbewegung" von Bestseller Tabellen auf Smartphones hinzugefügt

= Version 2.1.02 (20. Dezember 2015) =
* Neu: Shortcode-Attribut "title_length" hinzugefügt, um die Zeichenbeschränkung der Produkttitel zu überschreiben
* Neu: Shortcode-Attribut "description_length" hinzugefügt, um die Zeichenbeschränkung der Produktbeschreibungs-Listenpunkte zu überschreiben
* Neu: Shortcode-Attribut "button_detail_title" hinzugefügt, um den Detail-Button Link-Title zu überschreiben
* Neu: Sterne-Bewertungen können nun über die Plugin-Einstellungen ausgeblendet werden
* Neu: Plugin-Einstellungen können über den Bereich "Support" zurückgesetzt werden (diese Aktion ist nicht umkehrbar!)
* Verbesserung: Abstand nach unten bei der letzten von mehreren Boxen innerhalb eines Widgets entfernt
* Verbesserung: Ungewollte Zeilenumbrüche und leere Paragraphen bei der Ausgabe des Shortcodes entfernt
* Verbesserung: Umbenennung der Button-Klassen um Probleme mit anderen Plugins/Themes oder Icon-Schriftarten zu vermeiden
* Vorerst werden die Styles wieder global geladen um Probleme mit Caching-/Minify- oder Autoptimize-Plugins zu vermeiden
* API-Unterstützung für Indien & Brasilien wiederhergestellt
* Styles für Produktboxen optimiert: z.B. Abstände der Buttons und Maximalbreite der Infobox
* Fehlende Übersetzungen der Plugin-Einstellungen hinzugefügt

= Version 2.1.01 (15th December 2015) =
* Fix: Issue with frontend style loading for fields, tablepress and pagebuilder

= Version 2.1.0 (13th December 2015) =
* New: Added field value "list_price"
* New: Added "link_icon" attribute for overwriting the link icon via shortcode
* New: Added "button_text" attribute for overwriting the default button text via shortcode

* Optimized and scaled down widget styles
* Comeback of the list price and reduction for widgets
* Moved box pricing back above the buttons and optimized styling in order to fix the overlapping issues
* Optimized general layout styles to prevent issues with theme styling
* When using field values "price" & "list_price" and no price is available, a note will be returned

* Fix: Disclaimer text at the bottom of the page didn't show up
* Fix: Custom CSS was not executed
* Fix: Issue when multiple box items contain at least one wrong id
* Fix: Placeholder image url was broken
* Fix: Issue when bestseller items couldn't be fetched due to environment problems

= Version 2.0.02 (7th December 2015) =
* Fix: Bestseller search lead to results from a wrong category

= Version 2.0.01 (7th December 2015) =
* Fix: White page after plugin update/activation (occured only on webhostings with PHP < v5.3.0)
* Fix: Undefined infobox function call
* Fix: Missing button default German translation

= Version 2.0.0 (6th December 2015) =
* Complete rebuild, please take a look onto our website for the changelog

= Version 1.9.4 (29th November 2015) =
* Update 2.0 pre-release fixes and improvements

= Version 1.9.3 (22th November 2015) =
* New: Hide description by using desciption_items="none" or description="none" (box only)
* New: Added link_title attribute to set a custom link attribute
* Fix: Link icon now separated from anchor element to avoid whitespace underlines
* Added plugin 2.0 rebuild upgrade handler
* Added infobox on settings page

= Version 1.9.2 (19th November 2015) =
* Tremendous performance optimization
* New: Added inline info textfield to provide additional information within the product box
* New: Added field values: link, button, button_detail
* New: Added widget templates
* Field value thumb now includes a link
* Optimized widget & button styles
* Moved cart icon for buttons from img to css handling
* Details button shortcode attribute is now "button_detail" instead of "button"
* Added routine dependency checks

= Version 1.9.1 (15th November 2015) =
* Beta fixes

= Version 1.7.3 (15th November 2015) =
* Fixed some notices for empty results

= Version 1.7.2 (1st November 2015) =
* Fix: In some cases the list price was shown instead of the sale price

= Version 1.7.1 (24th October 2015) =
* Fix: Prefixed left function to solve "plugin_settings_link" issue
* Added new version of the integrated plugin updater

= Version 1.7.0 (23th October 2015) =
* Fix: Activation issue when installed PHP version is older than 5.3.0
* New: Added French & Italian translations. Thanks for your support!
* Help translating on https://poeditor.com/join/project/z6ncOXjq9i

= Version 1.6.0 (10th October 2015) =
* Optimized styles
* Cleared unneeded and old MySQL handling
* Rebuild license server handling (AAWP only)

= Version 1.5.2 (26th September 2015) =
* Optimized bestseller count handling

= Version 1.5.1 (13th September 2015) =
* Optimized bestseller count handling

= Version 1.5.0 (13th September 2015) =
* Fix: Half-star ratings sometimes were broken
* Reduced default bestseller entry count from 25 to 10. Max limit is still 25.
* Added SOAP check and notice if extension is missing

= Version 1.4.2 (7th September 2015) =
* Cleaned up settings code

= Version 1.4.1 (7th September 2015) =
* Fix: Description - especially books - sometimes showed "Array"

= Version 1.4.0 (28th August 2015) =
* Updated license server
* Optimized license activation error handling

= Version 1.3.0 (21th August 2015) =
* Rebuild plugin updater and license handler
* Added 'Add to cart' icon alt tag
* Fix: PHP notices for missing product attributes

= Version 1.2.5 (7th August 2015) =
* Optimized widget styles

= Version 1.2.4 (7th August 2015) =
* Optimized widget styles

= Version 1.2.3 (7th August 2015) =
* Optimized update checker implementation
* Added style support when placing shortcodes to widgets

= Version 1.2.2 (15th July 2015) =
* Optimized plugin update checker handling
* Included new plugin update checker v2.1 library

= Version 1.2.1 (15th June 2015) =
* Prefixed included Amazon library to avoid foreign plugin conflicts

= Version 1.2.0 (24th May 2015) =
* Optimized style implementation
* Rebuild admin menu
* Enhanced shortcode
* New: Templating
* New: Clear cache after entering a new tracking id

= Version 1.1.2 (12th May 2015) =
* Updated shortcode registration
* Optimized code and fixed PHP notices

= Version 1.1.1 (11th May 2015) =
* Rebuild caching including a tremendous performance optimization
* Cleaned up plugin assets

= Version 1.1.0 (3rd May 2015) =
* New: Added the first new style "Compact"
* New: Select a style on settings page and shortcode
* New: Set the number of description items on settings page and shortcode
* Rebuild description functionality
* Fix: Book description will show up correctly now
* Fix: Removed broken disclaimer links
* Moved Disclaimer to the end of a page/post and show only once

= Version 1.0.8 (1st May 2015) =
* New: Added link to product thumbnails

= Version 1.0.7 (18th April 2015) =
* New: Added disclaimer option
* Sidebar settings menu name
* Default caching time increased to 1 day
* Redesigned and optimized settings page

= Version 1.0.6 (7th April 2015) =
* New: Added Amazon India and Brazil
* Updated settings page

= Version 1.0.5 (3rd April 2015) =
* New: Display error message when disconnected

= Version 1.0.4 (29th March 2015) =
* Fix: "No products found" problem
* Improved caching functionality

= Version 1.0.3 (27th March 2015) =
* New: Added automatic updates
* New: Added star ratings
* Fix: Configuration page link
* Smaller improvements and fixes

= Version 1.0 (20th March 2015) =
* Initial release