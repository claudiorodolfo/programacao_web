<?php
// exit if accessed directly
if ( ! defined( 'ABSPATH' ) )
	exit;

/**
 * Cookie_Notice_Bot_Detect class.
 *
 * Based on CrawlerDetect php class adjusted to PHP 5.2
 * https://github.com/JayBizzle/Crawler-Detect/blob/master/src/CrawlerDetect.php
 *
 * @since 2.0.0
 * @class Cookie_Notice_Bot_Detect
 */
class Cookie_Notice_Bot_Detect {

	/**
	 * The user agent.
	 *
	 * @var null
	 */
	protected $user_agent = null;

	/**
	 * Headers that contain a user agent.
	 *
	 * @var array
	 */
	protected $http_headers = [];

	/**
	 * Store regex matches.
	 *
	 * @var array
	 */
	protected $matches = [];

	/**
	 * Crawlers object.
	 *
	 * @var object
	 */
	protected $crawlers = [];

	/**
	 * Exclusions object.
	 *
	 * @var object
	 */
	protected $exclusions = [];

	/**
	 * Headers object.
	 *
	 * @var object
	 */
	protected $ua_http_headers;

	/**
	 * Class constructor.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->crawlers = $this->get_crawlers_list();
		$this->exclusions = $this->get_exclusions_list();

		add_action( 'after_setup_theme', [ $this, 'init' ] );
	}

	/**
	 * Initialize class.
	 *
	 * @return void
	 */
	public function init() {
		// break on admin side
		if ( is_admin() && ! wp_doing_ajax() )
			return;

		$this->ua_http_headers = $this->get_headers_list();
		$this->set_http_headers();
		$this->set_user_agent();
	}

	/**
	 * Set HTTP headers.
	 *
	 * @param array $http_headers
	 * @return void
	 */
	public function set_http_headers( $http_headers = null ) {
		// use global _SERVER if $http_headers aren't defined
		if ( ! is_array( $http_headers ) || ! count( $http_headers ) )
			$http_headers = $_SERVER;

		// clear existing headers
		$this->http_headers = [];

		// only save HTTP headers - in PHP land, that means only _SERVER vars that start with HTTP_.
		foreach ( $http_headers as $key => $value ) {
			if ( substr( $key, 0, 5 ) === 'HTTP_' )
				$this->http_headers[$key] = $value;
		}
	}

	/**
	 * Return user agent headers.
	 *
	 * @return array
	 */
	public function get_ua_http_headers() {
		return $this->ua_http_headers;
	}

	/**
	 * Return the user agent.
	 *
	 * @return string
	 */
	public function get_user_agent() {
		return $this->user_agent;
	}

	/**
	 * Set the user agent.
	 *
	 * @param string $user_agent
	 * @return string
	 */
	public function set_user_agent( $user_agent = null ) {
		if ( false === empty( $user_agent ) )
			return $this->user_agent = $user_agent;
		else {
			$this->user_agent = null;

			foreach ( $this->get_ua_http_headers() as $alt_header ) {
				if ( false === empty( $this->http_headers[$alt_header] ) ) // @todo: should use get_http_header(), but it would be slow.
					$this->user_agent .= $this->http_headers[$alt_header] . ' ';
			}

			return $this->user_agent = ( ! empty( $this->user_agent ) ? trim( $this->user_agent ) : null );
		}
	}

	/**
	 * Build the user agent regex.
	 *
	 * @return string
	 */
	public function get_regex() {
		return '(' . implode( '|', $this->crawlers ) . ')';
	}

	/**
	 * Build the replacement regex.
	 *
	 * @return string
	 */
	public function get_exclusions() {
		return '(' . implode( '|', $this->exclusions ) . ')';
	}

	/**
	 * Check user agent string against the regex.
	 *
	 * @param string $user_agent
	 * @return bool
	 */
	public function is_crawler( $user_agent = null ) {
		$agent = (string)( is_null( $user_agent ) ? $this->user_agent : $user_agent );
		$agent = preg_replace( '/' . $this->get_exclusions() . '/i', '', $agent );

		if ( strlen( trim( $agent ) ) === 0 )
			return false;
		else
			$result = preg_match( '/' . $this->get_regex() . '/i', trim( $agent ), $matches );

		if ( $matches )
			$this->matches = $matches;

		return (bool) $result;
	}

	/**
	 * Return the matches.
	 *
	 * @return string
	 */
	public function get_matches() {
		return isset( $this->matches[0] ) ? $this->matches[0] : null;
	}

	/**
	 * Return the regular expressions to match against the user agent.
	 *
	 * @return array
	 */
	protected function get_crawlers_list() {
		return [
			' YLT',
			'^Aether',
			'^Amazon Simple Notification Service Agent$',
			'^Amazon-Route53-Health-Check-Service',
			'^b0t$',
			'^bluefish ',
			'^Calypso v\/',
			'^COMODO DCV',
			'^Corax',
			'^DangDang',
			'^DavClnt',
			'^DHSH',
			'^docker\/[0-9]',
			'^Expanse',
			'^FDM ',
			'^git\/',
			'^Goose\/',
			'^Grabber',
			'^Gradle\/',
			'^HTTPClient\/',
			'^HTTPing',
			'^Java\/',
			'^Jeode\/',
			'^Jetty\/',
			'^Mail\/',
			'^Mget',
			'^Microsoft URL Control',
			'^Mikrotik\/',
			'^Netlab360',
			'^NG\/[0-9\.]',
			'^NING\/',
			'^npm\/',
			'^Nuclei',
			'^PHP-AYMAPI\/',
			'^PHP\/',
			'^pip\/',
			'^pnpm\/',
			'^RMA\/',
			'^Ruby|Ruby\/[0-9]',
			'^Swurl ',
			'^TLS tester ',
			'^twine\/',
			'^ureq',
			'^VSE\/[0-9]',
			'^WordPress\.com',
			'^XRL\/[0-9]',
			'^ZmEu',
			'008\/',
			'13TABS',
			'192\.comAgent',
			'2GDPR\/',
			'2ip\.ru',
			'404enemy',
			'7Siters',
			'80legs',
			'a3logics\.in',
			'A6-Indexer',
			'Abonti',
			'Aboundex',
			'aboutthedomain',
			'Accoona-AI-Agent',
			'acebookexternalhit\/',
			'acoon',
			'acrylicapps\.com\/pulp',
			'Acunetix',
			'AdAuth\/',
			'adbeat',
			'AddThis',
			'ADmantX',
			'AdminLabs',
			'adressendeutschland',
			'adreview\/',
			'adscanner',
			'adstxt-worker',
			'Adstxtaggregator',
			'adstxt\.com',
			'Adyen HttpClient',
			'AffiliateLabz\/',
			'affilimate-puppeteer',
			'agentslug',
			'AHC',
			'aihit',
			'aiohttp\/',
			'Airmail',
			'akka-http\/',
			'akula\/',
			'alertra',
			'alexa site audit',
			'Alibaba\.Security\.Heimdall',
			'Alligator',
			'allloadin',
			'AllSubmitter',
			'alyze\.info',
			'amagit',
			'Anarchie',
			'AndroidDownloadManager',
			'Anemone',
			'AngleSharp',
			'annotate_google',
			'Anthill',
			'Anturis Agent',
			'Ant\.com',
			'AnyEvent-HTTP\/',
			'Apache Ant\/',
			'Apache Droid',
			'Apache OpenOffice',
			'Apache-HttpAsyncClient',
			'Apache-HttpClient',
			'ApacheBench',
			'Apexoo',
			'apimon\.de',
			'APIs-Google',
			'AportWorm\/',
			'AppBeat\/',
			'AppEngine-Google',
			'AppleSyndication',
			'Aprc\/[0-9]',
			'Arachmo',
			'arachnode',
			'Arachnophilia',
			'aria2',
			'Arukereso',
			'asafaweb',
			'Asana\/',
			'Ask Jeeves',
			'AskQuickly',
			'ASPSeek',
			'Asterias',
			'Astute',
			'asynchttp',
			'Attach',
			'attohttpc',
			'autocite',
			'AutomaticWPTester',
			'Autonomy',
			'awin\.com',
			'AWS Security Scanner',
			'axios\/',
			'a\.pr-cy\.ru',
			'B-l-i-t-z-B-O-T',
			'Backlink-Ceck',
			'backlink-check',
			'BacklinkHttpStatus',
			'BackStreet',
			'BackupLand',
			'BackWeb',
			'Bad-Neighborhood',
			'Badass',
			'baidu\.com',
			'Bandit',
			'basicstate',
			'BatchFTP',
			'Battleztar Bazinga',
			'baypup\/',
			'BazQux',
			'BBBike',
			'BCKLINKS',
			'BDFetch',
			'BegunAdvertising',
			'Bewica-security-scan',
			'Bidtellect',
			'BigBozz',
			'Bigfoot',
			'biglotron',
			'BingLocalSearch',
			'BingPreview',
			'binlar',
			'biNu image cacher',
			'Bitacle',
			'Bitrix link preview',
			'biz_Directory',
			'BKCTwitterUnshortener\/',
			'Black Hole',
			'Blackboard Safeassign',
			'BlackWidow',
			'BlockNote\.Net',
			'BlogBridge',
			'Bloglines',
			'Bloglovin',
			'BlogPulseLive',
			'BlogSearch',
			'Blogtrottr',
			'BlowFish',
			'boitho\.com-dc',
			'Boost\.Beast',
			'BPImageWalker',
			'Braintree-Webhooks',
			'Branch Metrics API',
			'Branch-Passthrough',
			'Brandprotect',
			'BrandVerity',
			'Brandwatch',
			'Brodie\/',
			'Browsershots',
			'BUbiNG',
			'Buck\/',
			'Buddy',
			'BuiltWith',
			'Bullseye',
			'BunnySlippers',
			'Burf Search',
			'Butterfly\/',
			'BuzzSumo',
			'CAAM\/[0-9]',
			'CakePHP',
			'Calculon',
			'Canary%20Mail',
			'CaretNail',
			'catexplorador',
			'CC Metadata Scaper',
			'Cegbfeieh',
			'censys',
			'centuryb.o.t9[at]gmail.com',
			'Cerberian Drtrs',
			'CERT\.at-Statistics-Survey',
			'cf-facebook',
			'cg-eye',
			'changedetection',
			'ChangesMeter',
			'Charlotte',
			'chatterino-api-cache',
			'CheckHost',
			'checkprivacy',
			'CherryPicker',
			'ChinaClaw',
			'Chirp\/',
			'chkme\.com',
			'Chlooe',
			'Chromaxa',
			'CirrusExplorer',
			'CISPA Vulnerability Notification',
			'CISPA Web Analyser',
			'Citoid',
			'CJNetworkQuality',
			'Clarsentia',
			'clips\.ua\.ac\.be',
			'Cloud mapping',
			'CloudEndure',
			'CloudFlare-AlwaysOnline',
			'Cloudflare-Healthchecks',
			'Cloudinary',
			'cmcm\.com',
			'coccoc',
			'cognitiveseo',
			'ColdFusion',
			'colly -',
			'CommaFeed',
			'Commons-HttpClient',
			'commonscan',
			'contactbigdatafr',
			'contentkingapp',
			'Contextual Code Sites Explorer',
			'convera',
			'CookieReports',
			'copyright sheriff',
			'CopyRightCheck',
			'Copyscape',
			'cortex\/',
			'Cosmos4j\.feedback',
			'Covario-IDS',
			'Craw\/',
			'Crescent',
			'Criteo',
			'Crowsnest',
			'CSHttp',
			'CSSCheck',
			'Cula\/',
			'curb',
			'Curious George',
			'curl',
			'cuwhois\/',
			'cybo\.com',
			'DAP\/NetHTTP',
			'DareBoost',
			'DatabaseDriverMysqli',
			'DataCha0s',
			'DatadogSynthetics',
			'Datafeedwatch',
			'Datanyze',
			'DataparkSearch',
			'dataprovider',
			'DataXu',
			'Daum(oa)?[ \/][0-9]',
			'dBpoweramp',
			'ddline',
			'deeris',
			'delve\.ai',
			'Demon',
			'DeuSu',
			'developers\.google\.com\/\+\/web\/snippet\/',
			'Devil',
			'Digg',
			'Digincore',
			'DigitalPebble',
			'Dirbuster',
			'Discourse Forum Onebox',
			'Dispatch\/',
			'Disqus\/',
			'DittoSpyder',
			'dlvr',
			'DMBrowser',
			'DNSPod-reporting',
			'docoloc',
			'Dolphin http client',
			'DomainAppender',
			'DomainLabz',
			'Domains Project\/',
			'Donuts Content Explorer',
			'dotMailer content retrieval',
			'dotSemantic',
			'downforeveryoneorjustme',
			'Download Wonder',
			'downnotifier',
			'DowntimeDetector',
			'Drip',
			'drupact',
			'Drupal \(\+http:\/\/drupal\.org\/\)',
			'DTS Agent',
			'dubaiindex',
			'DuplexWeb-Google',
			'DynatraceSynthetic',
			'EARTHCOM',
			'Easy-Thumb',
			'EasyDL',
			'Ebingbong',
			'ec2linkfinder',
			'eCairn-Grabber',
			'eCatch',
			'ECCP',
			'eContext\/',
			'Ecxi',
			'EirGrabber',
			'ElectricMonk',
			'elefent',
			'EMail Exractor',
			'EMail Wolf',
			'EmailWolf',
			'Embarcadero',
			'Embed PHP Library',
			'Embedly',
			'endo\/',
			'europarchive\.org',
			'evc-batch',
			'EventMachine HttpClient',
			'Everwall Link Expander',
			'Evidon',
			'Evrinid',
			'ExactSearch',
			'ExaleadCloudview',
			'Excel\/',
			'exif',
			'ExoRank',
			'Exploratodo',
			'Express WebPictures',
			'Extreme Picture Finder',
			'EyeNetIE',
			'ezooms',
			'facebookexternalhit',
			'facebookexternalua',
			'facebookplatform',
			'fairshare',
			'Faraday v',
			'fasthttp',
			'Faveeo',
			'Favicon downloader',
			'faviconarchive',
			'faviconkit',
			'FavOrg',
			'Feed Wrangler',
			'Feedable\/',
			'Feedbin',
			'FeedBooster',
			'FeedBucket',
			'FeedBunch\/',
			'FeedBurner',
			'feeder',
			'Feedly',
			'FeedshowOnline',
			'Feedshow\/',
			'Feedspot',
			'FeedViewer\/',
			'Feedwind\/',
			'FeedZcollector',
			'feeltiptop',
			'Fetch API',
			'Fetch\/[0-9]',
			'Fever\/[0-9]',
			'FHscan',
			'Fiery%20Feeds',
			'Filestack',
			'Fimap',
			'findlink',
			'findthatfile',
			'FlashGet',
			'FlipboardBrowserProxy',
			'FlipboardProxy',
			'FlipboardRSS',
			'Flock\/',
			'Florienzh\/',
			'fluffy',
			'Flunky',
			'flynxapp',
			'forensiq',
			'ForusP',
			'FoundSeoTool',
			'fragFINN\.de',
			'free thumbnails',
			'Freeuploader',
			'FreshRSS',
			'frontman',
			'Funnelback',
			'Fuzz Faster U Fool',
			'G-i-g-a-b-o-t',
			'g00g1e\.net',
			'ganarvisitas',
			'gdnplus\.com',
			'geek-tools',
			'Genieo',
			'GentleSource',
			'GetCode',
			'Getintent',
			'GetLinkInfo',
			'getprismatic',
			'GetRight',
			'getroot',
			'GetURLInfo\/',
			'GetWeb',
			'Geziyor',
			'Ghost Inspector',
			'GigablastOpenSource',
			'GIS-LABS',
			'github-camo',
			'GitHub-Hookshot',
			'github\.com',
			'Go http package',
			'Go [\d\.]* package http',
			'Go!Zilla',
			'Go-Ahead-Got-It',
			'Go-http-client',
			'go-mtasts\/',
			'gobuster',
			'gobyus',
			'Gofeed',
			'gofetch',
			'Goldfire Server',
			'GomezAgent',
			'gooblog',
			'Goodzer\/',
			'Google AppsViewer',
			'Google Desktop',
			'Google favicon',
			'Google Keyword Suggestion',
			'Google Keyword Tool',
			'Google Page Speed Insights',
			'Google PP Default',
			'Google Search Console',
			'Google Web Preview',
			'Google-Ads-Creatives-Assistant',
			'Google-Ads-Overview',
			'Google-Adwords',
			'Google-Apps-Script',
			'Google-Calendar-Importer',
			'Google-HotelAdsVerifier',
			'Google-HTTP-Java-Client',
			'Google-InspectionTool',
			'Google-Podcast',
			'Google-Publisher-Plugin',
			'Google-Read-Aloud',
			'Google-SearchByImage',
			'Google-Site-Verification',
			'Google-SMTP-STS',
			'Google-speakr',
			'Google-Structured-Data-Testing-Tool',
			'Google-Transparency-Report',
			'google-xrawler',
			'Google-Youtube-Links',
			'GoogleDocs',
			'GoogleHC\/',
			'GoogleProber',
			'GoogleProducer',
			'GoogleSites',
			'Gookey',
			'GoSpotCheck',
			'gosquared-thumbnailer',
			'Gotit',
			'GoZilla',
			'grabify',
			'GrabNet',
			'Grafula',
			'Grammarly',
			'GrapeFX',
			'GreatNews',
			'Gregarius',
			'GRequests',
			'grokkit',
			'grouphigh',
			'grub-client',
			'gSOAP\/',
			'GT::WWW',
			'GTmetrix',
			'GuzzleHttp',
			'gvfs\/',
			'HAA(A)?RTLAND http client',
			'Haansoft',
			'hackney\/',
			'Hadi Agent',
			'HappyApps-WebCheck',
			'Hardenize',
			'Hatena',
			'Havij',
			'HaxerMen',
			'HeadlessChrome',
			'HEADMasterSEO',
			'HeartRails_Capture',
			'help@dataminr\.com',
			'heritrix',
			'Hexometer',
			'historious',
			'hkedcity',
			'hledejLevne\.cz',
			'Hloader',
			'HMView',
			'Holmes',
			'HonesoSearchEngine',
			'HootSuite Image proxy',
			'Hootsuite-WebFeed',
			'hosterstats',
			'HostTracker',
			'ht:\/\/check',
			'htdig',
			'HTMLparser',
			'htmlyse',
			'HTTP Banner Detection',
			'http-get',
			'HTTP-Header-Abfrage',
			'http-kit',
			'http-request\/',
			'HTTP-Tiny',
			'HTTP::Lite',
			'http:\/\/www.neomo.de\/',
			'HttpComponents',
			'httphr',
			'HTTPie',
			'HTTPMon',
			'httpRequest',
			'httpscheck',
			'httpssites_power',
			'httpunit',
			'HttpUrlConnection',
			'http\.rb\/',
			'HTTP_Compression_Test',
			'http_get',
			'http_request2',
			'http_requester',
			'httrack',
			'huaweisymantec',
			'HubSpot ',
			'HubSpot-Link-Resolver',
			'Humanlinks',
			'i2kconnect\/',
			'Iblog',
			'ichiro',
			'Id-search',
			'IdeelaborPlagiaat',
			'IDG Twitter Links Resolver',
			'IDwhois\/',
			'Iframely',
			'igdeSpyder',
			'iGooglePortal',
			'IlTrovatore',
			'Image Fetch',
			'Image Sucker',
			'ImageEngine\/',
			'ImageVisu\/',
			'Imagga',
			'imagineeasy',
			'imgsizer',
			'InAGist',
			'inbound\.li parser',
			'InDesign%20CC',
			'Indy Library',
			'InetURL',
			'infegy',
			'infohelfer',
			'InfoTekies',
			'InfoWizards Reciprocal Link',
			'inpwrd\.com',
			'instabid',
			'Instapaper',
			'Integrity',
			'integromedb',
			'Intelliseek',
			'InterGET',
			'Internet Ninja',
			'InternetSeer',
			'internetVista monitor',
			'internetwache',
			'internet_archive',
			'intraVnews',
			'IODC',
			'IOI',
			'Inboxb0t',
			'iplabel',
			'ips-agent',
			'IPS\/[0-9]',
			'IPWorks HTTP\/S Component',
			'iqdb\/',
			'Iria',
			'Irokez',
			'isitup\.org',
			'iskanie',
			'isUp\.li',
			'iThemes Sync\/',
			'IZaBEE',
			'iZSearch',
			'JAHHO',
			'janforman',
			'Jaunt\/',
			'Java.*outbrain',
			'javelin\.io',
			'Jbrofuzz',
			'Jersey\/',
			'JetCar',
			'Jigsaw',
			'Jobboerse',
			'JobFeed discovery',
			'Jobg8 URL Monitor',
			'jobo',
			'Jobrapido',
			'Jobsearch1\.5',
			'JoinVision Generic',
			'JolokiaPwn',
			'Joomla',
			'Jorgee',
			'JS-Kit',
			'JungleKeyThumbnail',
			'JustView',
			'Kaspersky Lab CFR link resolver',
			'Kelny\/',
			'Kerrigan\/',
			'KeyCDN',
			'Keyword Density',
			'Keywords Research',
			'khttp\/',
			'KickFire',
			'KimonoLabs\/',
			'Kml-Google',
			'knows\.is',
			'KOCMOHABT',
			'kouio',
			'kube-probe',
			'kubectl',
			'kulturarw3',
			'KumKie',
			'Larbin',
			'Lavf\/',
			'leakix\.net',
			'LeechFTP',
			'LeechGet',
			'letsencrypt',
			'Lftp',
			'LibVLC',
			'LibWeb',
			'Libwhisker',
			'libwww',
			'Licorne',
			'Liferea\/',
			'Lighthouse',
			'Lightspeedsystems',
			'Likse',
			'limber\.io',
			'Link Valet',
			'LinkAlarm\/',
			'LinkAnalyser',
			'linkCheck',
			'linkdex',
			'LinkExaminer',
			'linkfluence',
			'linkpeek',
			'LinkPreview',
			'LinkScan',
			'LinksManager',
			'LinkTiger',
			'LinkWalker',
			'link_thumbnailer',
			'Lipperhey',
			'Litemage_walker',
			'livedoor ScreenShot',
			'LoadImpactRload',
			'localsearch-web',
			'LongURL API',
			'longurl-r-package',
			'looid\.com',
			'looksystems\.net',
			'ltx71',
			'lua-resty-http',
			'Lucee \(CFML Engine\)',
			'Lush Http Client',
			'lwp-request',
			'lwp-trivial',
			'LWP::Simple',
			'lycos',
			'LYT\.SR',
			'L\.webis',
			'mabontland',
			'MacOutlook\/',
			'Mag-Net',
			'MagpieRSS',
			'Mail::STS',
			'MailChimp',
			'Mail\.Ru',
			'Majestic12',
			'makecontact\/',
			'Mandrill',
			'MapperCmd',
			'marketinggrader',
			'MarkMonitor',
			'MarkWatch',
			'Mass Downloader',
			'masscan\/',
			'Mata Hari',
			'mattermost',
			'Mediametric',
			'Mediapartners-Google',
			'mediawords',
			'MegaIndex\.ru',
			'MeltwaterNews',
			'Melvil Rawi',
			'MemGator',
			'Metaspinner',
			'MetaURI',
			'MFC_Tear_Sample',
			'Microsearch',
			'Microsoft Data Access',
			'Microsoft Office',
			'Microsoft Outlook',
			'Microsoft Windows Network Diagnostics',
			'Microsoft-WebDAV-MiniRedir',
			'Microsoft\.Data\.Mashup',
			'MIDown tool',
			'MIIxpc',
			'Mindjet',
			'Miniature\.io',
			'Miniflux',
			'mio_httpc',
			'Miro-HttpClient',
			'Mister PiX',
			'mixdata dot com',
			'mixed-content-scan',
			'mixnode',
			'Mnogosearch',
			'mogimogi',
			'Mojeek',
			'Mojolicious \(Perl\)',
			'Mollie',
			'monitis',
			'Monitority\/',
			'Monit\/',
			'montastic',
			'MonTools',
			'Moreover',
			'Morfeus Fucking Scanner',
			'Morning Paper',
			'MovableType',
			'mowser',
			'Mrcgiguy',
			'Mr\.4x3 Powered',
			'MS Web Services Client Protocol',
			'MSFrontPage',
			'mShots',
			'MuckRack\/',
			'muhstik-scan',
			'MVAClient',
			'MxToolbox\/',
			'myseosnapshot',
			'nagios',
			'Najdi\.si',
			'Name Intelligence',
			'NameFo\.com',
			'Nameprotect',
			'nationalarchives',
			'Navroad',
			'NearSite',
			'Needle',
			'Nessus',
			'Net Vampire',
			'NetAnts',
			'NETCRAFT',
			'NetLyzer',
			'NetMechanic',
			'NetNewsWire',
			'Netpursual',
			'netresearch',
			'NetShelter ContentScan',
			'Netsparker',
			'NetSystemsResearch',
			'nettle',
			'NetTrack',
			'Netvibes',
			'NetZIP',
			'Neustar WPM',
			'NeutrinoAPI',
			'NewRelicPinger',
			'NewsBlur .*Finder',
			'NewsGator',
			'newsme',
			'newspaper\/',
			'Nexgate Ruby Client',
			'NG-Search',
			'nghttp2',
			'Nibbler',
			'NICErsPRO',
			'NihilScio',
			'Nikto',
			'nineconnections',
			'NLNZ_IAHarvester',
			'Nmap Scripting Engine',
			'node-fetch',
			'node-superagent',
			'node-urllib',
			'Nodemeter',
			'NodePing',
			'node\.io',
			'nominet\.org\.uk',
			'nominet\.uk',
			'Norton-Safeweb',
			'Notifixious',
			'notifyninja',
			'NotionEmbedder',
			'nuhk',
			'nutch',
			'Nuzzel',
			'nWormFeedFinder',
			'nyawc\/',
			'Nymesis',
			'NYU',
			'Observatory\/',
			'Ocelli\/',
			'Octopus',
			'oegp',
			'Offline Explorer',
			'Offline Navigator',
			'OgScrper',
			'okhttp',
			'omgili',
			'OMSC',
			'Online Domain Tools',
			'Open Source RSS',
			'OpenCalaisSemanticProxy',
			'Openfind',
			'OpenLinkProfiler',
			'Openstat\/',
			'OpenVAS',
			'OPPO A33',
			'Optimizer',
			'Orbiter',
			'OrgProbe\/',
			'orion-semantics',
			'Outlook-Express',
			'Outlook-iOS',
			'Owler',
			'Owlin',
			'ownCloud News',
			'ow\.ly',
			'OxfordCloudService',
			'page scorer',
			'Page Valet',
			'page2rss',
			'PageFreezer',
			'PageGrabber',
			'PagePeeker',
			'PageScorer',
			'Pagespeed\/',
			'PageThing',
			'page_verifier',
			'Panopta',
			'panscient',
			'Papa Foto',
			'parsijoo',
			'Pavuk',
			'PayPal IPN',
			'pcBrowser',
			'Pcore-HTTP',
			'PDF24 URL To PDF',
			'Pearltrees',
			'PECL::HTTP',
			'peerindex',
			'Peew',
			'PeoplePal',
			'Perlu -',
			'PhantomJS Screenshoter',
			'PhantomJS\/',
			'Photon\/',
			'php-requests',
			'phpservermon',
			'Pi-Monster',
			'Picscout',
			'Picsearch',
			'PictureFinder',
			'Pimonster',
			'Pingability',
			'PingAdmin\.Ru',
			'Pingdom',
			'Pingoscope',
			'PingSpot',
			'ping\.blo\.gs',
			'pinterest\.com',
			'Pixray',
			'Pizilla',
			'Plagger\/',
			'Pleroma ',
			'Ploetz \+ Zeller',
			'Plukkie',
			'plumanalytics',
			'PocketImageCache',
			'PocketParser',
			'Pockey',
			'PodcastAddict\/',
			'POE-Component-Client-HTTP',
			'Polymail\/',
			'Pompos',
			'Porkbun',
			'Port Monitor',
			'postano',
			'postfix-mta-sts-resolver',
			'PostmanRuntime',
			'postplanner\.com',
			'PostPost',
			'postrank',
			'PowerPoint\/',
			'Prebid',
			'Prerender',
			'Priceonomics Analysis Engine',
			'PrintFriendly',
			'PritTorrent',
			'Prlog',
			'probethenet',
			'Project ?25499',
			'Project-Resonance',
			'prospectb2b',
			'Protopage',
			'ProWebWalker',
			'proximic',
			'PRTG Network Monitor',
			'pshtt, https scanning',
			'PTST ',
			'PTST\/[0-9]+',
			'Pump',
			'Python-httplib2',
			'python-httpx',
			'python-requests',
			'Python-urllib',
			'Qirina Hurdler',
			'QQDownload',
			'QrafterPro',
			'Qseero',
			'Qualidator',
			'QueryN Metasearch',
			'queuedriver',
			'quic-go-HTTP\/',
			'QuiteRSS',
			'Quora Link Preview',
			'Qwantify',
			'Radian6',
			'RadioPublicImageResizer',
			'Railgun\/',
			'RankActive',
			'RankFlex',
			'RankSonicSiteAuditor',
			'RapidLoad\/',
			'Re-re Studio',
			'ReactorNetty',
			'Readability',
			'RealDownload',
			'RealPlayer%20Downloader',
			'RebelMouse',
			'Recorder',
			'RecurPost\/',
			'redback\/',
			'ReederForMac',
			'Reeder\/',
			'ReGet',
			'RepoMonkey',
			'request\.js',
			'reqwest\/',
			'ResponseCodeTest',
			'RestSharp',
			'Riddler',
			'Rival IQ',
			'Robosourcer',
			'Robozilla',
			'ROI Hunter',
			'RPT-HTTPClient',
			'RSSMix\/',
			'RSSOwl',
			'RyowlEngine',
			'safe-agent-scanner',
			'SalesIntelligent',
			'Saleslift',
			'SAP NetWeaver Application Server',
			'SauceNAO',
			'SBIder',
			'sc-downloader',
			'scalaj-http',
			'Scamadviser-Frontend',
			'ScanAlert',
			'scan\.lol',
			'Scoop',
			'scooter',
			'ScopeContentAG-HTTP-Client',
			'ScoutJet',
			'ScoutURLMonitor',
			'ScrapeBox Page Scanner',
			'Scrapy',
			'Screaming',
			'ScreenShotService',
			'Scrubby',
			'Scrutiny\/',
			'Search37',
			'searchenginepromotionhelp',
			'Searchestate',
			'SearchExpress',
			'SearchSight',
			'SearchWP',
			'search\.thunderstone',
			'Seeker',
			'semanticdiscovery',
			'semanticjuice',
			'Semiocast HTTP client',
			'Semrush',
			'Sendsay\.Ru',
			'sentry\/',
			'SEO Browser',
			'Seo Servis',
			'seo-nastroj\.cz',
			'seo4ajax',
			'Seobility',
			'SEOCentro',
			'SeoCheck',
			'seocompany',
			'SEOkicks',
			'SEOlizer',
			'Seomoz',
			'SEOprofiler',
			'seoscanners',
			'SEOsearch',
			'seositecheckup',
			'SEOstats',
			'servernfo',
			'sexsearcher',
			'Seznam',
			'Shelob',
			'Shodan',
			'Shoppimon',
			'ShopWiki',
			'ShortLinkTranslate',
			'shortURL lengthener',
			'shrinktheweb',
			'Sideqik',
			'Siege',
			'SimplePie',
			'SimplyFast',
			'Siphon',
			'SISTRIX',
			'Site Sucker',
			'Site-Shot\/',
			'Site24x7',
			'SiteBar',
			'Sitebeam',
			'Sitebulb\/',
			'SiteCondor',
			'SiteExplorer',
			'SiteGuardian',
			'Siteimprove',
			'SiteIndexed',
			'Sitemap(s)? Generator',
			'SitemapGenerator',
			'SiteMonitor',
			'Siteshooter B0t',
			'SiteSnagger',
			'SiteSucker',
			'SiteTruth',
			'Sitevigil',
			'sitexy\.com',
			'SkypeUriPreview',
			'Slack\/',
			'sli-systems\.com',
			'slider\.com',
			'slurp',
			'SlySearch',
			'SmartDownload',
			'SMRF URL Expander',
			'SMUrlExpander',
			'Snake',
			'Snappy',
			'SnapSearch',
			'Snarfer\/',
			'SniffRSS',
			'sniptracker',
			'Snoopy',
			'SnowHaze Search',
			'sogou web',
			'SortSite',
			'Sottopop',
			'sovereign\.ai',
			'SpaceBison',
			'SpamExperts',
			'Spammen',
			'Spanner',
			'Spawning-AI',
			'spaziodati',
			'SPDYCheck',
			'Specificfeeds',
			'SpeedKit',
			'speedy',
			'SPEng',
			'Spinn3r',
			'spray-can',
			'Sprinklr ',
			'spyonweb',
			'sqlmap',
			'Sqlworm',
			'Sqworm',
			'SSL Labs',
			'ssl-tools',
			'StackRambler',
			'Statastico\/',
			'Statically-',
			'StatusCake',
			'Steeler',
			'Stratagems Kumo',
			'Stripe\/',
			'Stroke\.cz',
			'StudioFACA',
			'StumbleUpon',
			'suchen',
			'Sucuri',
			'summify',
			'SuperHTTP',
			'Surphace Scout',
			'Suzuran',
			'swcd ',
			'Symfony BrowserKit',
			'Symfony2 BrowserKit',
			'Synapse\/',
			'Syndirella\/',
			'SynHttpClient-Built',
			'Sysomos',
			'sysscan',
			'Szukacz',
			'T0PHackTeam',
			'tAkeOut',
			'Tarantula\/',
			'Taringa UGC',
			'TarmotGezgin',
			'tchelebi\.io',
			'techiaith\.cymru',
			'Teleport',
			'Telesoft',
			'Telesphoreo',
			'Telesphorep',
			'Tenon\.io',
			'teoma',
			'terrainformatica',
			'Test Certificate Info',
			'testuri',
			'Tetrahedron',
			'TextRazor Downloader',
			'The Drop Reaper',
			'The Expert HTML Source Viewer',
			'The Intraformant',
			'The Knowledge AI',
			'theinternetrules',
			'TheNomad',
			'Thinklab',
			'Thumbor',
			'Thumbshots',
			'ThumbSniper',
			'timewe\.net',
			'TinEye',
			'Tiny Tiny RSS',
			'TLSProbe\/',
			'Toata',
			'topster',
			'touche\.com',
			'Traackr\.com',
			'tracemyfile',
			'Trackuity',
			'TrapitAgent',
			'Trendiction',
			'Trendsmap',
			'trendspottr',
			'truwoGPS',
			'TryJsoup',
			'TulipChain',
			'Turingos',
			'Turnitin',
			'tweetedtimes',
			'Tweetminster',
			'Tweezler\/',
			'twibble',
			'Twice',
			'Twikle',
			'Twingly',
			'Twisted PageGetter',
			'Typhoeus',
			'ubermetrics-technologies',
			'uclassify',
			'UdmSearch',
			'ultimate_sitemap_parser',
			'unchaos',
			'unirest-java',
			'UniversalFeedParser',
			'unshortenit',
			'Unshorten\.It',
			'Untiny',
			'UnwindFetchor',
			'updated',
			'updown\.io daemon',
			'Upflow',
			'Uptimia',
			'URL Verifier',
			'Urlcheckr',
			'URLitor',
			'urlresolver',
			'Urlstat',
			'URLTester',
			'UrlTrends Ranking Updater',
			'URLy Warning',
			'URLy\.Warning',
			'URL\/Emacs',
			'Vacuum',
			'Vagabondo',
			'VB Project',
			'vBSEO',
			'VCI',
			'via ggpht\.com GoogleImageProxy',
			'Virusdie',
			'visionutils',
			'Visual Rights Group',
			'vkShare',
			'VoidEYE',
			'Voil',
			'voltron',
			'voyager\/',
			'VSAgent\/',
			'VSB-TUO\/',
			'Vulnbusters Meter',
			'VYU2',
			'w3af\.org',
			'W3C-checklink',
			'W3C-mobileOK',
			'W3C_Unicorn',
			'WAC-OFU',
			'WakeletLinkExpander',
			'WallpapersHD',
			'Wallpapers\/[0-9]+',
			'wangling',
			'Wappalyzer',
			'WatchMouse',
			'WbSrch\/',
			'WDT\.io',
			'Web Auto',
			'Web Collage',
			'Web Enhancer',
			'Web Fetch',
			'Web Fuck',
			'Web Pix',
			'Web Sauger',
			'Web spyder',
			'Web Sucker',
			'web-capture\.net',
			'Web-sniffer',
			'Webalta',
			'Webauskunft',
			'WebAuto',
			'WebCapture',
			'WebClient\/',
			'webcollage',
			'WebCookies',
			'WebCopier',
			'WebCorp',
			'WebDataStats',
			'WebDoc',
			'WebEnhancer',
			'WebFetch',
			'WebFuck',
			'WebGazer',
			'WebGo IS',
			'WebImageCollector',
			'WebImages',
			'WebIndex',
			'webkit2png',
			'WebLeacher',
			'webmastercoffee',
			'webmon ',
			'WebPix',
			'WebReaper',
			'WebSauger',
			'webscreenie',
			'Webshag',
			'Webshot',
			'Website Quester',
			'websitepulse agent',
			'WebsiteQuester',
			'Websnapr',
			'WebSniffer',
			'Webster',
			'WebStripper',
			'WebSucker',
			'webtech\/',
			'WebThumbnail',
			'Webthumb\/',
			'WebWhacker',
			'WebZIP',
			'WeLikeLinks',
			'WEPA',
			'WeSEE',
			'wf84',
			'Wfuzz\/',
			'wget',
			'WhatCMS',
			'WhatsApp',
			'WhatsMyIP',
			'WhatWeb',
			'WhereGoes\?',
			'Whibse',
			'WhoAPI\/',
			'WhoRunsCoinHive',
			'Whynder Magnet',
			'Windows-RSS-Platform',
			'WinHttp-Autoproxy-Service',
			'WinHTTP\/',
			'WinPodder',
			'wkhtmlto',
			'wmtips',
			'Woko',
			'Wolfram HTTPClient',
			'woorankreview',
			'WordupinfoSearch',
			'Word\/',
			'worldping-api',
			'wotbox',
			'WP Engine Install Performance API',
			'wpif',
			'wprecon\.com survey',
			'WPScan',
			'wscheck',
			'Wtrace',
			'WWW-Collector-E',
			'WWW-Mechanize',
			'WWW::Document',
			'WWW::Mechanize',
			'WWWOFFLE',
			'www\.monitor\.us',
			'x09Mozilla',
			'x22Mozilla',
			'XaxisSemanticsClassifier',
			'XenForo\/',
			'Xenu Link Sleuth',
			'XING-contenttabreceiver',
			'xpymep([0-9]?)\.exe',
			'Y!J-[A-Z][A-Z][A-Z]',
			'Yaanb',
			'yacy',
			'Yahoo Link Preview',
			'YahooCacheSystem',
			'YahooMailProxy',
			'YahooYSMcm',
			'YandeG',
			'Yandex(?!Search)',
			'yanga',
			'yeti',
			'Yo-yo',
			'Yoleo Consumer',
			'yomins\.com',
			'yoogliFetchAgent',
			'YottaaMonitor',
			'Your-Website-Sucks',
			'yourls\.org',
			'YoYs\.net',
			'YP\.PL',
			'Zabbix',
			'Zade',
			'Zao',
			'Zauba',
			'Zemanta Aggregator',
			'Zend\\Http\\Client',
			'Zend_Http_Client',
			'Zermelo',
			'Zeus ',
			'zgrab',
			'ZnajdzFoto',
			'ZnHTTP',
			'Zombie\.js',
			'Zoom\.Mac',
			'ZoteroTranslationServer',
			'ZyBorg',
			'[a-z0-9\-_]*(bot|crawl|archiver|transcoder|spider|uptime|validator|fetcher|cron|checker|reader|extractor|monitoring|analyzer|scraper)'
		];
	}

	/**
	 * Return the list of strings to remove from the user agent before running the crawler regex.
	 *
	 * @return array
	 */
	public function get_exclusions_list() {
		return [
			'Safari.[\d\.]*',
			'Firefox.[\d\.]*',
			' Chrome.[\d\.]*',
			'Chromium.[\d\.]*',
			'MSIE.[\d\.]',
			'Opera\/[\d\.]*',
			'Mozilla.[\d\.]*',
			'AppleWebKit.[\d\.]*',
			'Trident.[\d\.]*',
			'Windows NT.[\d\.]*',
			'Android [\d\.]*',
			'Macintosh.',
			'Ubuntu',
			'Linux',
			'[ ]Intel',
			'Mac OS X [\d_]*',
			'(like )?Gecko(.[\d\.]*)?',
			'KHTML,',
			'CriOS.[\d\.]*',
			'CPU iPhone OS ([0-9_])* like Mac OS X',
			'CPU OS ([0-9_])* like Mac OS X',
			'iPod',
			'compatible',
			'x86_..',
			'i686',
			'x64',
			'X11',
			'rv:[\d\.]*',
			'Version.[\d\.]*',
			'WOW64',
			'Win64',
			'Dalvik.[\d\.]*',
			' \.NET CLR [\d\.]*',
			'Presto.[\d\.]*',
			'Media Center PC',
			'BlackBerry',
			'Build',
			'Opera Mini\/\d{1,2}\.\d{1,2}\.[\d\.]*\/\d{1,2}\.',
			'Opera',
			' \.NET[\d\.]*',
			'cubot',
			'; M bot',
			'; CRONO',
			'; B bot',
			'; IDbot',
			'; ID bot',
			'; POWER BOT',
			'OCTOPUS-CORE',
			'htc_botdugls',
			'super\/\d+\/Android\/\d+',
		];
	}

	/**
	 * Return all possible HTTP headers that represent the User-Agent string.
	 *
	 * @return array
	 */
	public function get_headers_list() {
		return [
			// The default User-Agent string.
			'HTTP_USER_AGENT',
			// Header can occur on devices using Opera Mini.
			'HTTP_X_OPERAMINI_PHONE_UA',
			// Vodafone specific header: http://www.seoprinciple.com/mobile-web-community-still-angry-at-vodafone/24/
			'HTTP_X_DEVICE_USER_AGENT',
			'HTTP_X_ORIGINAL_USER_AGENT',
			'HTTP_X_SKYFIRE_PHONE',
			'HTTP_X_BOLT_PHONE_UA',
			'HTTP_DEVICE_STOCK_UA',
			'HTTP_X_UCBROWSER_DEVICE_UA',
			// Sometimes, bots (especially Google) use a genuine user agent, but fill this header in with their email address
			'HTTP_FROM',
			'HTTP_X_SCANNER' // Seen in use by Netsparker
		];
	}
}
