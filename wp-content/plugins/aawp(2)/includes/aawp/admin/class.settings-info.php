<?php
// Exit if accessed directly
if( !defined( 'ABSPATH' ) ) exit;

if ( !class_exists( 'AAWP_Settings_Info' ) ) {

    class AAWP_Settings_Info extends AAWP_Functions {

        /**
         * Construct the plugin object
         */
        public function __construct()
        {
            // Call parent constructor first
            parent::__construct();

            // Settings functions
            add_filter( $this->settings_tabs_filter, array( &$this, 'add_settings_tabs_filter' ) );
            add_filter( $this->settings_plugins_filter, array( &$this, 'add_settings_plugins_filter' ) );
            add_filter( $this->settings_functions_filter, array( &$this, 'add_settings_functions_filter' ) );

            add_action( 'admin_init', array( &$this, 'add_settings' ) );
        }

        /**
         * Add settings functions
         */
        public function add_settings_tabs_filter( $tabs ) {

            $title = ( $this->lang_de ) ? 'Weitere Funktionen freischalten' : 'Unlock more features';

            $tabs[180] = array(
                'key' => 'info',
                'icon' => 'unlock',
                'title' => $title
            );

            $tabs[180]['alert'] = 'success';

            return $tabs;
        }

        public function add_settings_plugins_filter( $plugins ) {

            $plugins[] = $this->plugin_name;

            return $plugins;
        }

        public function add_settings_functions_filter( $functions ) {

            $functions[] = 'info';

            return $functions;
        }

        /**
         * API Settings: Register section and fields
         */
        public function add_settings() {

            register_setting(
                'aawp_info',
                'aawp_info',
                array( &$this, 'settings_info_callback')
            );

            add_settings_section(
                'aawp_info_section',
                '',
                array( &$this, 'settings_info_section_callback' ),
                'aawp_info'
            );

            /*
             * Action to add more settings within this section
             */
            do_action( 'aawp_settings_info_register' );
        }

        /**
         * Settings callbacks
         */
        public function settings_info_callback( $input ) {

            // Silence
            return $input;
        }

        public function settings_info_section_callback() {

            // Basic
            if ( $this->lang_de ) {
                $upgrade_link = 'https://getaawp.comvato/';
                $upgrade_text = 'Jetzt 15 EUR Rabatt einlösen und wechseln';
                $upgrade_infotext = 'Zur Verifizierung wird lediglich dein CodeCanyon "Item Purchase Code" benötigt. Wir erklären dir, wo du ihn findest.' ;
            } else {
                $upgrade_link = 'https://getaawp.com/envato/';
                $upgrade_text = 'Use your 15€ discount and upgrade now';
                $upgrade_infotext = 'For verification reason you will be asked for your CodeCanyon "Item Purchase Code". We show you, where to find it.';
            }

            // TODO
            if ( $this->lang_de ) {
                $upgrade_infotext = 'Dein Rabatt wird beim Bestellprozess berücksichtigt.';
            } else {
                $upgrade_infotext = 'Your discount will be applied on the checkout page.';
            }

            // Campaign
            $campaign_parameters = '?utm_source=codecanyon&utm_medium=Amazon%20Bestseller%20for%20WordPress&utm_content=Plugin%20settings&utm_campaign=CS';

            // Finally
            $upgrade_link .= $campaign_parameters;

            ?>
            <?php if ( $this->lang_de ) { ?>
                <h2><strong>Du findest <?php echo $this->plugin_name; ?> toll? Es geht noch besser!</strong></h2>
                <p>
                    Der <em>große Bruder</em> "Amazon Affiliate for WordPress" beinhaltet nicht nur die Funktionen dieses Plugins, sondern darüber hinaus noch einiges mehr.<br />
                    <strong>Exklusiver Vorteil für dich</strong>: Für das Upgrade zu "AAWP" geben wir dir, als Besitzer von <?php echo $this->plugin_name; ?>, einen <strong>Rabatt in Höhe von 15 EUR</strong> auf den Verkaufspreis.
                </p>
            <?php } else { ?>
                <h2><strong>You like <?php echo $this->plugin_name; ?> so far? It can be even better!</strong></h2>
                <p>
                    The <em>big brother</em> "Amazon Affiliate for WordPress" not only includes the functionality of this plugin, it offers a lot more!<br />
                    <strong>Exclusive benefit for you</strong>: When upgrading to "AAWP" you will receive a <strong>15€ discount</strong> on the advertised price as a thank-you gift for purchasing <?php echo $this->plugin_name; ?> earlier.
                </p>
            <?php } ?>

            <hr />

            <h1 style="padding: 0 10px; margin: 25px 0 15px;">Amazon Affiliate for WordPress</h1>
            <p style="padding: 0 10px;">
                <strong><?php _e('Related links:', 'aawp'); ?></strong>&nbsp;
                <?php if ( $this->lang_de ) { ?>
                    <a href="https://aawp.de/funktionen/<?php echo $campaign_parameters; ?>" target="_blank" rel="nofollow" title="Amazon Affiliate for WordPress - Funktionen">Alle Funktionen</a>&nbsp;&bull;&nbsp;
                    <a href="https://aawp.de/demo/<?php echo $campaign_parameters; ?>" target="_blank" rel="nofollow" title="Amazon Affiliate for WordPress - Demo">Demo</a>&nbsp;&bull;&nbsp;
                    <a href="https://aawp.de/hilfe/<?php echo $campaign_parameters; ?>" target="_blank" rel="nofollow" title="Amazon Affiliate for WordPress - Fragen vor dem Kauf">Fragen vor dem Kauf</a>
                <?php } else { ?>
                    <a href="https://getaawp.com/features/<?php echo $campaign_parameters; ?>" target="_blank" rel="nofollow" title="Amazon Affiliate for WordPress - Features">All features</a>&nbsp;&bull;&nbsp;
                    <a href="https://getaawp.com/demo/<?php echo $campaign_parameters; ?>" target="_blank" rel="nofollow" title="Amazon Affiliate for WordPress - Demo">Demo</a>&nbsp;&bull;&nbsp;
                    <a href="https://getaawp.com/help/<?php echo $campaign_parameters; ?>" target="_blank" rel="nofollow" title="Amazon Affiliate for WordPress - Pre-sale questions">Pre-sale questions</a>
                <?php } ?>
            </p>

            <div class="aawp-feature-box">

                <div class="aawp-feature-box__row aawp-clearfix">
                    <div class="aawp-feature-box__item">
                        <?php if ( $this->lang_de ) { ?>
                            <h3>Textlinks</h3>
                            <p>Mit Textlinks kannst du einen Produktnamen gezielt im Fließtext ausgeben. Dabei werden der entsprechende Link und Ausgabename automatisch generiert. Letzterer kann ebenfalls selbst gewählt werden.</p>
                        <?php } else { ?>
                            <h3>Text links</h3>
                            <p>With text links you can issue a specific product name inside your content. Here, the corresponding link and output name are generated automatically. The product name can be overwritten manually.</p>
                        <?php } ?>
                    </div>

                    <div class="aawp-feature-box__item">
                        <?php if ( $this->lang_de ) { ?>
                            <h3>Einzelne (oder mehrere) Produktboxen</h3>
                            <p>Du möchtest ein spezielles Amazon-Produkt in einem Beitrag oder auf einer Seite platzieren? Mit den Produktboxen kannst du ein oder mehrere Produkt(e) optisch ansprechend darstellen. Diese beinhalten u.a. Titel, Beschreibung, aktuelle Preisinformationen, Rabatte und Call-to-Action-Buttons.</p>
                        <?php } else { ?>
                            <h3>Single (or multiple) product boxes</h3>
                            <p>Do you want a specific Amazon product to be displayed in a single post or page? With one shortcode you can easily display one or more visually appealing product boxes. Features included in the product boxes are for example: title, description, current availability and prices, discounts and call-to-action buttons.</p>
                        <?php } ?>
                    </div>
                </div>

                <div class="aawp-feature-box__row aawp-clearfix">
                    <div class="aawp-feature-box__item">
                        <?php if ( $this->lang_de ) { ?>
                            <h3>Bestseller (Listen)</h3>
                            <p>Mit den Bestseller-Listen kannst du deinen Besuchern ein richtig starkes Verkaufsargument liefern, indem du zu einer speziellen Produktgruppe (oder Suchbegriff) die meistverkauften Produkte auflistest. Darüber hinaus hast du die Möglichkeit, die Anzahl der Produkte selbst festzulegen: Top 3, Top 10 etc.</p>
                        <?php } else { ?>
                            <h3>Bestseller (lists)</h3>
                            <p>With the bestseller lists you can deliver a really strong selling reason to your visitors by listing the best-selling products to a specific product group or keyword. In addition, you have the ability to set the number of products individually: e.g. Top 3, Top 10 etc.</p>
                        <?php } ?>
                    </div>

                    <div class="aawp-feature-box__item">
                        <?php if ( $this->lang_de ) { ?>
                            <h3>Neuerscheinungen (Listen)</h3>
                            <p>Mit AAWP kannst du deine Besucher auf die neuesten Produkte einer speziellen Produktgruppe aufmerksam machen. Analog zu den Bestseller-Listen hast du die Möglichkeit, die Anzahl der Produkte selbst festzulegen.</p>
                        <?php } else { ?>
                            <h3>New Releases (lists)</h3>
                            <p>What about attracting your visitor’s attention towards the latest products within a specific product group? Just like the bestseller lists, you have the ability to set the number rankings of the products themselves.</p>
                        <?php } ?>
                    </div>
                </div>

                <div class="aawp-feature-box__row aawp-clearfix">
                    <div class="aawp-feature-box__item">
                        <?php if ( $this->lang_de ) { ?>
                            <h3>Datenfelder</h3>
                            <p>Nutze die Felder um einzelne Produktinformationen wie z.B. Titel, Beschreibung, der aktuelle Preis oder Kaufen-Button an beliebigen Stellen deiner Beiträge/Seiten auszugeben. Die sogenannten „Fields“, können ebenfalls – über die bereitgestellten PHP-Funktionen – direkt in den Dateien deines Themes ausgegeben werden.</p>
                        <?php } else { ?>
                            <h3>Fields</h3>
                            <p>Using “Fields” you can place individual product information (such as the title, description, current price or buy button) anywhere in your posts / pages. These can also be used directly inside your templates files via the provided PHP functions.</p>
                        <?php } ?>
                    </div>

                    <div class="aawp-feature-box__item">
                        <?php if ( $this->lang_de ) { ?>
                            <h3>Widgets</h3>
                            <p>Um Produkte in deiner Sidebar auszugeben, stehen dir Widgets zur Verfügung. Dabei kannst du zwischen den verfügbaren Funktionen auswählen. Wenn du darüber hinaus mehr Anpassungen benötigst, kannst du alternativ auch die Shortcodes in einem Text-Widget (oder Visual Composer) platzieren.</p>
                        <?php } else { ?>
                            <h3>Widgets</h3>
                            <p>In order to integrate items into your sidebar, widgets are available to assist you. Here you can choose between the core functionality listed above. If you need more adjustments, you can alternatively place the shortcodes in a text widget (or Visual Composer) too.</p>
                        <?php } ?>
                    </div>
                </div>

                <div class="aawp-feature-box__row aawp-clearfix">
                    <div class="aawp-feature-box__item">

                        <?php if ( $this->lang_de ) { ?>
                            <h3>Weitere Highlights</h3>
                            <ul class="aawp-feature-list aawp-clearfix">
                                <li>PHP-Templates</li>
                                <li>Amazon Prime-Artikel</li>
                                <li>Filtern und Sortieren von Listen</li>
                                <li>Developer-Lizenz zur Nutzung auf beliebig vielen Seiten</li>
                            </ul>
                        <?php } else { ?>
                            <h3>More highlights</h3>
                            <ul class="aawp-feature-list aawp-clearfix">
                                <li>PHP templating</li>
                                <li>Amazon prime service</li>
                                <li>Filtering and ordering of lists</li>
                                <li>Developer license for unlimited sites</li>
                            </ul>
                        <?php } ?>
                    </div>

                    <div class="aawp-feature-box__item">
                        <p>
                            <a class="aawp-cta-button" href="<?php echo $upgrade_link; ?>" title="<?php echo $upgrade_text; ?>" target="_blank" rel="nofollow"><span class="dashicons dashicons-yes"></span> <?php echo $upgrade_text; ?></a>
                        </p>
                        <p style="font-size: 90%; font-style: italic; color: #777;"><?php echo $upgrade_infotext; ?></p>
                    </div>
                </div>

            </div>
            <?php
        }
    }

    if ( ! class_exists( 'AAWP_Affiliate' ) && ! class_exists( 'AAWP_Beta' ) ) {
        new AAWP_Settings_Info();
    }
}