--
-- PostgreSQL database dump
--

-- Dumped from database version 16.1
-- Dumped by pg_dump version 16.1

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: carrello; Type: TABLE; Schema: public; Owner: www
--

CREATE TABLE public.carrello (
    piatto text NOT NULL,
    email text NOT NULL,
    quantita integer
);


ALTER TABLE public.carrello OWNER TO www;

--
-- Name: menu; Type: TABLE; Schema: public; Owner: www
--

CREATE TABLE public.menu (
    nome text NOT NULL,
    lista_ingredienti text,
    descrizione_breve text,
    descrizione_lunga text,
    categoria text,
    prezzo double precision,
    foto text
);


ALTER TABLE public.menu OWNER TO www;

--
-- Name: newsletter; Type: TABLE; Schema: public; Owner: www
--

CREATE TABLE public.newsletter (
    email text NOT NULL
);


ALTER TABLE public.newsletter OWNER TO www;

--
-- Name: ordinazioni; Type: TABLE; Schema: public; Owner: www
--

CREATE TABLE public.ordinazioni (
    id integer NOT NULL,
    email text NOT NULL,
    total double precision NOT NULL,
    tipo_spedizione text
);


ALTER TABLE public.ordinazioni OWNER TO www;

--
-- Name: ordinazioni_elementi; Type: TABLE; Schema: public; Owner: www
--

CREATE TABLE public.ordinazioni_elementi (
    id_ordinazione integer NOT NULL,
    quantita integer NOT NULL,
    subtotale double precision NOT NULL,
    piatto text NOT NULL
);


ALTER TABLE public.ordinazioni_elementi OWNER TO www;

--
-- Name: ordinazioni_elementi_id_ordinazione_seq; Type: SEQUENCE; Schema: public; Owner: www
--

CREATE SEQUENCE public.ordinazioni_elementi_id_ordinazione_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.ordinazioni_elementi_id_ordinazione_seq OWNER TO www;

--
-- Name: ordinazioni_elementi_id_ordinazione_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: www
--

ALTER SEQUENCE public.ordinazioni_elementi_id_ordinazione_seq OWNED BY public.ordinazioni_elementi.id_ordinazione;


--
-- Name: ordinazioni_id_seq; Type: SEQUENCE; Schema: public; Owner: www
--

CREATE SEQUENCE public.ordinazioni_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER SEQUENCE public.ordinazioni_id_seq OWNER TO www;

--
-- Name: ordinazioni_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: www
--

ALTER SEQUENCE public.ordinazioni_id_seq OWNED BY public.ordinazioni.id;


--
-- Name: utenti; Type: TABLE; Schema: public; Owner: www
--

CREATE TABLE public.utenti (
    email text NOT NULL,
    password text NOT NULL,
    nome text NOT NULL,
    cognome text NOT NULL,
    genere "char",
    nazione text,
    citta text,
    via text,
    civico integer,
    telefono text
);


ALTER TABLE public.utenti OWNER TO www;

--
-- Name: ordinazioni id; Type: DEFAULT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.ordinazioni ALTER COLUMN id SET DEFAULT nextval('public.ordinazioni_id_seq'::regclass);


--
-- Name: ordinazioni_elementi id_ordinazione; Type: DEFAULT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.ordinazioni_elementi ALTER COLUMN id_ordinazione SET DEFAULT nextval('public.ordinazioni_elementi_id_ordinazione_seq'::regclass);


--
-- Data for Name: carrello; Type: TABLE DATA; Schema: public; Owner: www
--

COPY public.carrello (piatto, email, quantita) FROM stdin;
Spaghettoni con le Sarde	mariorossi@gmail.com	1
Calamarata all'Eleganza del Mare	mariorossi@gmail.com	1
\.


--
-- Data for Name: menu; Type: TABLE DATA; Schema: public; Owner: www
--

COPY public.menu (nome, lista_ingredienti, descrizione_breve, descrizione_lunga, categoria, prezzo, foto) FROM stdin;
Spaghetti Cacio e Pepe	spaghetti fatti a mano, pecorino romano D.O.P., pepe nero in grani	Un'opera d'arte culinaria dello chef, con pasta al dente avvolta in una crema di uovo, pecorino e guanciale croccante, esaltata da una pioggia di pepe nero appena macinato.	Esecuzione Raffinata:<br>\r\n- Gli spaghetti, lavorati con maestria, sono cotti al punto perfetto di consistenza artigianale.<br>\r\n- Il Pecorino Romano, grattugiato al momento, si fonde in una crema vellutata che avvolge ogni singolo filo di pasta.<br>\r\n- Il pepe nero, macinato delicatamente, è dosato con precisione per esaltare senza dominare i sapori.<br><br>    \r\nPresentazione Sofisticata:<br>\r\n- Gli spaghetti sono attentamente disposti, svelando la ricchezza del Pecorino Romano grattugiato.<br>\r\n- Una leggera spolverata di pepe nero in grani danza sulla superficie della pasta, anticipando il suo carattere vibrante.<br>\r\n- La presentazione, semplice ed elegante, celebra la bellezza della cucina romana tradizionale.<br><br>    \r\nUn Viaggio Sensoriale Unico:<br>\r\nI nostri Spaghetti Cacio e Pepe incarnano la quintessenza della tradizione romana. Un piatto dove la maestria nella pasta <br>\r\nfatta a mano si unisce alla ricchezza del Pecorino Romano e al pungente aroma del pepe nero. Un'esperienza gastronomica <br>\r\nche rende omaggio alla storia culinaria dell'Italia.	Classici	45	media/piatti/cacioEPepe.png
Spaghettoni con le Sarde	spaghettoni di grano duro, sarde fresche, cipollotto Bio, finocchietto selvatico raccolto a mano, zafferano di pistilli, Pangrattato di grano duro, crema Pomodoro, Olio Extravergine d'Oliva, Aglio tritato, Origano, Prezzemolo, e Peperoncino secco, per una mollica croccante che completa il piatto	Una sinfonia di sapori siciliani, con pasta impeccabilmente al \r\n    dente, sardine fresche, pinoli croccanti, uvetta succulenta e un \r\n    tocco di finocchietto selvatico, armonizzati in una sublime danza \r\n    gustativa.	Esecuzione Raffinata:<br>\r\n- Gli Spaghettoni, cotti al dente, mantengono la loro consistenza artigianale.<br>\r\n- Le Sarde, preparate con cura, si fondono con il cipollotto, l'aglio, l'uva passa, i pinoli e le acciughe, <br>\r\ncreando un condimento che abbraccia la tradizione siciliana.<br>\r\n- Il Finocchietto Selvatico, cotto con attenzione, aggiunge un tocco aromatico fresco e unico.<br>\r\n- La mollica croccante, preparata con passione, completa il piatto con una nota di croccantezza e sapore.<br><br>    \r\nPresentazione Sofisticata:<br>\r\n- Gli Spaghettoni sono arrotolati con grazia, avvolti dal condimento aromatico e decorati con la mollica croccante.<br>\r\n- Il Finocchietto Selvatico è disposto con eleganza, aggiungendo un tocco di verde alla composizione.<br>\r\n- Il piatto è completato da un filo di Olio Extravergine d'Oliva, sottolineando l'autenticità degli ingredienti siciliani.<br><br>    \r\nUn Viaggio nel Cuore della Sicilia:<br>\r\nLo Spaghettoni con le Sarde è un viaggio gustativo nella tradizione siciliana, dove il mare si fonde con<br>\r\nla terra in un connubio di sapori autentici. Un piatto che celebra la ricchezza della cultura siciliana, <br>\r\noffrendo un'esperienza culinaria raffinata e indimenticabile.	Classici	50	media/piatti/spaghettiConLeSarde.png
Pasta alla Norma	sedanini raffinati fatti a mano, melanzane violette di Vittoria (selezione Bio), ricotta di pecora salata Sarda, pomodoro Costoluti, Olio Extravergine d'oliva	Una celebrazione autunnale con pennette condite con una salsa \r\n    di funghi selvatici, pancetta croccante, panna delicata e un \r\n    tocco di prezzemolo fresco, creando un connubio di gusto e \r\n    raffinatezza.	Esecuzione Raffinata:<br>\r\n- I Sedani Rigati, fatti a mano con grano bio, sono cotti al dente, preservando la loro consistenza artigianale.<br>\r\n- Le Melanzane Violette, di Vittoria e bio, sono preparate con maestria, aggiungendo una nota di dolcezza al piatto.<br>\r\n- La Ricotta di pecora, salata e bio, si fonde delicatamente, creando una crema avvolgente.<br><br>\r\nPresentazione Sofisticata:<br>\r\n- Gli ingredienti bio sono disposti con eleganza sul piatto, creando un'armonia visiva.<br>\r\n- Il sugo, ricco di Pomodori Costoluti e aromi bio, avvolge la pasta in un abbraccio di sapori mediterranei.<br>\r\n- Una generosa porzione di Ricotta di pecora corona il piatto, aggiungendo un tocco finale di cremosità.<br>\r\n- Il Basilico fresco, bio, danza sulla superficie, anticipando la fragranza del Mediterraneo.<br><br>\r\nUn'Esperienza Bio e Tradizionale:<br>\r\nLa Pasta alla Norma, con ingredienti bio di eccellenza, celebra la tradizione culinaria italiana e l'impegno<br>\r\nper la sostenibilità. Un viaggio gastronomico nel cuore della Sicilia, dove ogni boccone racconta la storia di<br>\r\ningredienti bio coltivati con passione e rispetto per la natura.	Classici	55	media/piatti/allaNorma.png
Tagliatelle di Seta alla Lupara	pasta fresca, soppressata irpina, panna Bio, pomodoro, parmiggiano D.O.P., peperoncino fresco	La cremosità raggiunge l'apice grazie alla fusione di panna e due noci\r\n    di burro, che avvolgono le tagliatelle come un abbraccio avvolgente. \r\n    Un tocco audace di peperoncino fresco aggiunge una nota vivace, mentre \r\n    il parmigiano grattugiato completa l'esperienza con la sua elegante complessità.	Presentazione Raffinata:<br>\r\nLe tagliatelle di seta si intrecciano con grazia su un piatto di porcellana bianca, pronte a ospitare il <br>\r\nmaestoso connubio di sapori. La soppressata, disposta con cura, danza tra le ondulazioni della pasta, <br>\r\nmentre la panna e il burro abbracciano ogni nastro con una carezza di cremosità.<br><br>\r\nUn Viaggio nel Gusto:<br>\r\nIl primo morso rivela l'armonia della soppressata, seguita dalla cremosità avvolgente della panna e del burro.<br>\r\nLa passata di pomodoro, intensa e avvolgente, si fonde con la piccantezza del peperoncino fresco, creando <br>\r\nun crescendo di sapori che culminano nel retrogusto ricco e persistente del parmigiano grattugiato.<br><br>\r\nUna Creazione Senza Paragoni:<br>\r\nLe Tagliatelle di Seta alla Lupara incarnano l'eccellenza culinaria, un'esperienza gastronomica pensata per <br>\r\ni palati più raffinati. Un capolavoro di equilibrio tra cremosità e piccantezza, destinato a rimanere impresso<br>\r\nnei ricordi dei buongustai più esigenti.	Rossi	60	media/piatti/lupara.png
Lasagna alla Bolognese	sfoglia d'orata fatta a mano, ragù tradizionale bolognese, besciamella Bio	La sua classicità intramontabile celebra la ricchezza delle tradizioni, esaltando l'arte \r\n    della preparazione con ingredienti di prima qualità e una passione \r\n    che va al di là del tempo.	Introduzione Gastronomica:<br>\r\nNel cuore della tradizione culinaria italiana, immergiti in un viaggio di sapori straordinari con la <br>\r\nnostra Lasagna alla Bolognese, un tributo alla classicità che risplende nel panorama gastronomico. Il nostro <br>\r\nchef, custode di antiche ricette e appassionato cultore della perfezione culinaria, presenta questa creazione senza tempo.<br><br>\r\nStrato dopo Strato di Eccellenza:<br>\r\nLe sfoglie di pasta fatta in casa, arrotolate con perizia artigianale, delineano strato dopo strato un'opera <br>\r\nd'arte di eccellenza. La bontà della tradizionale salsa bolognese, elaborata con carne di manzo selezionata e un <br>\r\nsoffritto avvolgente, crea una melodia di sapori che danza in ogni morso.<br><br>\r\nBesciamella Avvolgente:<br>\r\nL'impalpabile besciamella, preparata con maestria, è il mantello avvolgente che avvicina ogni strato di pasta con <br>\r\ndelicatezza. La sua cremosità è un abbraccio soffice che sottolinea la consistenza di ogni strato, contribuendo a una sinfonia <br>\r\ndi sapori che si fondono in armonia.<br><br>\r\nFormaggio e Grana: il Regale Finale:<br>\r\nIl formaggio Parmigiano Reggiano e il Grana Padano, affermati nel panorama culinario italiano, completano la lasagna<br>\r\ncon la loro nobiltà. I loro strati, gratinati con precisione, si fondono in una crosta dorata che svela la quintessenza <br>\r\ndel formaggio italiano, regalando un finale che avvolge il palato in un tripudio di gusto.<br><br>\r\nLa Magia della Cottura:<br>\r\nLa nostra Lasagna alla Bolognese è l'epitome della perfezione culinaria, un'armonia di sapori che si intrecciano e <br>\r\nsi rivelano in ogni boccone. La magia della cottura lenta, tramandata da generazioni, permette agli aromi di maturare e <br>\r\nmescolarsi, offrendo un'esperienza gastronomica senza pari.	Rossi	55	media/piatti/lasagna.png
Orecchiette dell'Adriatico	Orecchiette artigianali, lavorate con la perizia di maestri pastaieri per garantire una consistenza unica,Salmone affumicato proveniente dalle acque cristalline dell'Adriatico, tagliato a mano con precisione,Formaggio fresco spalmabile di produzione locale, che conferisce una cremosità avvolgente, Zucchine appena raccolte da agricoltori locali, tagliate a julienne per una freschezza ineguagliabile, Aglio fresco, per un tocco aromatico sottile ma distintivo, Mandorle tostate per esaltare la croccantezza e aggiungere una nota di eleganza, Foglie di basilico fresco, selezionate con cura per un profumo erbaceo sottolineato, Parmigiano Reggiano DOP, grattugiato al momento per una ricchezza di sapori ineguagliabile, Olio di oliva extravergine, proveniente dalle colline italiane, per un finale di gusto impeccabile	Un trionfo della cucina italiana, le nostre Orecchiette con Zucchine e Salmone Affumicato sono una sinfonia di sapori artigianali. Le orecchiette al dente abbracciano il sapore marino del salmone affumicato, mentre le zucchine fresche offrono una croccantezza ineguagliabile. Il formaggio fresco spalmabile crea una crema vellutata, arricchita dalla croccantezza delle mandorle tostate. Il tutto è esaltato dal Parmigiano Reggiano DOP e da un filo di olio extravergine di oliva. Un'esperienza culinaria che celebra l'italianità autentica in ogni boccone.	Orecchiette dell'Adriatico con Zucchine di Stagione e Salmone Affumicato<br>\r\nUn capolavoro culinario che incarna l'essenza della tradizione italiana, le nostre Orecchiette con Zucchine di stagione e <br>\r\nSalmone Affumicato sono un'elevazione dell'arte della pasta fatta a mano.<br><br>\r\nPresentazione Esclusiva:<br>\r\nServito con un tocco finale di Parmigiano Reggiano grattugiato al momento, basilico fresco e un filo di olio extravergine <br>\r\ndi oliva di alta qualità, questo piatto è un'opera d'arte culinaria che celebra l'eleganza della cucina italiana. <br>\r\nIndulgete nei sapori distintivi di questo piatto, un'esperienza gastronomica che unisce la maestria tradizionale con un<br>\r\ntocco di modernità. Benvenuti a un viaggio sensoriale senza tempo.	Mare	80	media/piatti/orecchietteAllAdriatico.png
Calamarata all'Eleganza del Mare	Calamarata artigianale, una pasta avvolgente creata con maestria, Calamari appena pescati e preparati con precisione, garanzia di freschezza e sapore marino autentico, Pomodorini ciliegino, selezionati con cura per la loro dolcezza e succosità.	Immergetevi nell'essenza del Mediterraneo con la nostra Calamarata, una sinfonia di sapori marini e pasta artigianale. Le Calamari appena pescati, uniti con maestria alla pasta al dente, creano una danza di freschezza e consistenza. I Pomodorini Ciliegino, il triplo concentrato di pomodoro e un tocco di vino bianco aggiungono complessità, mentre aglio, peperoncino fresco e prezzemolo elevano l'aroma mediterraneo. Presentata con eleganza e arricchita dall'Olio Extravergine d'Oliva, la Calamarata all'Eleganza del Mare è un invito a gustare l'autentico sapore del mare italiano in ogni boccone.	Esecuzione Raffinata:<br>\r\n- La Calamarata è cotta al dente, preservando la sua consistenza avvolgente.<br>\r\n- I Calamari, puliti e tagliati con maestria, si fondono armoniosamente con la pasta.<br>\r\n- Aglio, peperoncino fresco e prezzemolo, dosati con precisione, arricchiscono il piatto di aromi mediterranei.<br>\r\n- Una nota di vino bianco e triplo concentrato di pomodoro aggiungono complessità e profondità.<br><br>\r\nPresentazione Sofisticata:<br>\r\n- Gli ingredienti freschi sono disposti con eleganza sulla Calamarata, creando un'opulenza visiva.<br>\r\n- Il piatto è impreziosito da un filo di Olio Extravergine d'Oliva, completando l'esperienza con la sua delicatezza.<br>\r\n<br>Un Viaggio Gustativo nel Mare Italiano:<br>\r\nLa Calamarata all'Eleganza del Mare è una celebrazione della cucina italiana e dei suoi tesori marini. Un piatto dove<br>\r\nla pasta artigianale abbraccia il pesce appena pescato, creando un'esperienza culinaria che incarna la freschezza del Mediterraneo.	Mare	75	media/piatti/calamarata.png
Mafalde marine	pasta fatta a mano dai nostri prestigiosi chef, cime di rapa fresche e succulente, spicchi d'aglio per un tocco aromatico, peperoncino rosso a risvegliare il palato,  mandorle pelate croccanti e aromatiche,  pecorino grattugiato per una nota di robustezza, filetti di acciughe sott'olio del pesce azzurro di prima qualità, burrata cremosa e avvolgente,  scorza di   limone grattugiata per un tocco di freschezza, Olio extravergine di oliva per la sublimazione degli aromi.	Mafalde all'uovo avvolte in un pesto di cime di rapa, abbracciate dalla cremosità della stracciatella di bufala e accarezzate dalle note intense delle acciughe di prima qualità. Un viaggio gustativo che celebra il mare in ogni morso.	Un'ode ai sapori del mare si dispiega in questa creazione gastronomica esclusiva: le Mafalde marine. Preparate con <br>\r\nmaestria, le mafalde, pasta all'uovo di prima qualità, abbracciano un mare di delicatezze che elevano questa pietanza a <br>\r\nun'autentica sinfonia culinaria.<br><br>\r\nPreparazione Artistica:<br>\r\nLe mafalde, avvolte con cura, fungono da tela per il capolavoro culinario che segue. Il pesto di cime di rapa, sapientemente <br>\r\namalgamato con aglio, peperoncino e mandorle, si sposa in un connubio di sapori che cattura l'essenza del Mediterraneo.<br>\r\nA coronare questa sinfonia marina, la stracciatella di bufala, lussuosa e cremosa, si fonde con il profumo intenso degli acciughe<br>\r\ndi prima qualità, mentre la scorza di limone grattugiata aggiunge una nota di freschezza raffinata.<br>\r\nServito con maestria su un letto di elegante porcellana, Mafalde marine è un'esperienza sensoriale che incanta il palato e <br>\r\ndelizia gli occhi. Un inno al pesce azzurro di prima qualità, questo piatto trasforma ogni boccone in un viaggio culinario <br>\r\nattraverso le acque cristalline del gusto.	Mare	80	media/piatti/mafaldeMarine.png
Spaghetti alla Carbonara Vegetariana	spaghetti, zucchine scure, tuorli d''uovo, scaglie di pecorino grattugiato, Olio extravergine di oliva, Sale e pepe nero.	Un'armonia di sapori che celebra la freschezza della natura. Un piatto che sfida\r\n      le convenzioni con eleganza, invitando gli ospiti a sperimentare una nuova dimensione\r\n      di gusto. Un'opera culinaria destinata a catturare l'attenzione e il palato degli\r\n      intenditori gastronomici.	Eleganza Spaghetto:<br>\r\nGli spaghetti, attentamente posati su un piatto di ceramica bianca, si presentano come fili d'arte pronti a<br>\r\ncatturare il palato dei buongustai più raffinati. La loro lunghezza si avvolge con grazia, creando una sinfonia<br>\r\nvisiva che anticipa la ricetta.<br><br>\r\nZucchine in Protagonista:<br>\r\nLe zucchine scure, tagliate con precisione, incarnano l'essenza della carbonara vegetale. Il verde intenso si <br>\r\nsposa con il giallo dei tuorli, creando un tableau cromatico che esalta la freschezza del piatto. Questi ortaggi, <br>\r\nsapientemente preparati, aggiungono una nota croccante e leggera, trasformando la tradizionale carbonara <br>\r\nin un'esperienza unica.<br><br>\r\nIl Cuore della Carbonara Vegetariana:<br>\r\nI tuorli d'uovo, ricchi e cremosi, sono il cuore pulsante di questa reinterpretazione della carbonara. Si amalgamano<br>\r\ncon il pecorino grattugiato, creando una vellutata salsa che abbraccia gli spaghetti con delicatezza. L'olio extravergine<br>\r\ndi oliva, con il suo aroma fruttato, contribuisce a elevare la cremosità del piatto.	Vegetariani	50	media/piatti/carbonaraVegetariana.png
Pesto di Eleganza Tricolore con Caviale  	Pesto di Cavolo Nero, maccheroni artigianali, Olio Extravergine d'Oliva, Caviale.	  Questo piatto unisce il verde intenso del pesto di cavolo nero all'oro\r\n      dell'olio extravergine d'oliva, arricchito dal lusso delle perle di caviale di zucca.\r\n      Un'ode alla tradizione tricolore italiana, dove ogni ingrediente racconta\r\n      una storia di eleganza e prelibatezza	Esecuzione Raffinata:<br>\r\n- La Pasta Corta, cucinata al punto giusto, mantiene la sua consistenza artigianale.<br>\r\n- Il Pesto di Cavolo Nero, preparato con maestria, avvolge la pasta con il suo colore intenso e il suo sapore vibrante.<br>\r\n- Un filo di Olio Extravergine d'Oliva, come un abbraccio dorato, completa la base del piatto.<br>\r\n- Il Caviale, disposto con precisione, aggiunge una nota di lusso e raffinatezza.<br><br>\r\nPresentazione Sofisticata:<br>\r\n- La pasta è disposta con grazia, abbracciata dal verde del pesto e decorata con le perle di caviale.<br>\r\n- Un leggero filo d'olio ricama la superficie, anticipando la ricchezza dei sapori.<br>\r\n- Il caviale è posato con eleganza, creando un effetto tricolore che delizia gli occhi e il palato.<br><br>\r\nUn'Esperienza Tricolore di Gusto:<br>\r\nIl Pesto di Eleganza Tricolore con Caviale è un inno alla raffinatezza italiana, dove il verde intenso del <br>\r\ncavolo nero si fonde con la lucentezza dell'olio e la prelibatezza del caviale.<br>\r\nUn piatto che celebra il tricolore, non solo visivamente, ma anche attraverso una sinfonia di sapori in ogni<br>\r\nboccone.	Vegetariani	65	media/piatti/pestoConCaviale.png
Melodia del Verde	Broccoli, linguine all'uovo, spicchio d'aglio, mandorle a scaglie,\r\n     Olio extravergine di oliva, Sale e pepe, Pecorino.	Le Linguine in Crema di Broccoli e Mandorle Scintillanti sono un'opera gastronomica\r\n    imponente, pensata per soddisfare i palati più esigenti. La diversità\r\n    di consistenze e la complessità dei sapori si fondono in un'armonia culinaria\r\n    che eleva questa pietanza a un'esperienza senza pari	Eleganza Vegetale:<br>\r\nI broccoli, collocati con precisione su un piatto di ceramica bianca, si ergono come fiori di verde lussureggiante. <br>\r\nLe loro teste, raccolte con attenzione, anticipano una composizione culinaria di eleganza vegetale.<br><br>\r\nLinguine Tessute: Un Arazzo di Pasta Fresca:<br>\r\nLe linguine, sapientemente intrecciate, si presentano come una cascata di fili d'arte pronti a catturare il palato.<br>\r\nLa loro consistenza al dente, combinata con la delicatezza della crema di broccoli, promette un'esperienza unica di ogni boccone.<br><br>\r\nCrema di Broccoli e Mandorle: Un'Esplosione di Consistenze:<br>\r\nLa crema di broccoli, arricchita dalle mandorle a scaglie, crea un equilibrio di consistenze sorprendente. I broccoli <br>\r\noffrono una consistenza morbida e vellutata, mentre le mandorle aggiungono un tocco croccante che scintilla come gemme <br>\r\npreziose nel piatto.<br><br>\r\nUn Finale di Complessità:<br>\r\nIl pecorino, con la sua complessità di sapori, è il tocco finale che corona la melodia del verde. La sua presenza nobilita il <br>\r\npiatto, aggiungendo strati di gusto che persistono delicatamente sul palato, completando questa composizione	Vegetariani	45	media/piatti/melodiaVerde.png
Eleganza Trionfante	Trofie fresche, scaglie di noci, spinaci novelli, mollica di pane, parmigiano reggiano grattugiato,\r\n    olio extravergine di oliva, latte, sale.	Le Trofie alla Crema di Noci e Balletto di Spinaci Novelli sono una\r\n      creazione culinaria culminante, destinata a essere il gioiello di ogni tavolo.\r\n      Un piatto che celebra la raffinatezza della dieta vegetariana	Trofie in Vortice Elegante:<br>\r\nLe trofie, disposte con cura su un piatto di ceramica, sono una sinfonia di forme che anticipa l'esperienza gustativa. La <br>\r\nloro freschezza e consistenza al dente sono il preludio a un vortice di sapori e sensazioni.<br><br>\r\nPesto di Noci e Spinaci: Un Raccogliersi di Delicatezza<br>\r\nIl pesto di noci, preparato con maestria, avvolge le trofie come una carezza di autunno. Gli spinaci novelli, puri e teneri, <br>\r\nsi fondono con la mollica di pane, creando una crema vellutata che avvolge ogni boccone. Il parmigiano reggiano, con la sua <br>\r\ncomplessità, aggiunge un tocco di nobiltà, mentre l'olio extravergine di oliva completa la composizione con la sua morbidezza.<br>\r\nBalletto di Sapori:<br>\r\nIl Balletto di Spinaci Novelli è la scena culinaria principale. Le foglie verdi, come ballerine leggere, danzano tra le trofie, <br>\r\ncreando un equilibrio di freschezza e cremosità. Il gusto pronunciato delle noci, unito alla delicatezza degli spinaci, si fonde <br>\r\nin un balletto di sapori che lascia un'impronta memorabile	Vegetariani	52	media/piatti/eleganzaTrionfante.png
Tagliolini d'Oro Autunnali	Pasta artigianale, semola rimacinata di grano duro, fecola di patate, crema di zucca, scalogno, latte di soia bio, olio extravergine d'oliva, thè fresco, thimo, sale, pepe\r\n    funghi porcini freschi, aglio, olio extravergine d'oliva, sale e pepe, briciole di pane grattugiate	La crema di zucca, arricchita dal profumo del thè, abbraccia i funghi porcini,\r\n    cotti con un tocco di Marsala e aglio. Le briciole di pane, grattugiate grossolanamente\r\n    e croccanti, sono la ciliegina sulla torta, conferendo una\r\n    dimensione croccante e avvolgente.	Esecuzione Raffinata:<br>\r\n- La pasta, risultato di una combinazione equilibrata di farina, fecola di patate e semola , è lavorata con maestria e <br>\r\ntrasformata in un tripudio dorato di tagliolini.<br>\r\n- La crema di zucca, preparata con precisione e aromatizzata con thè fresco e thimo, avvolge ogni filo di pasta con <br>\r\nuna delicatezza unica.<br>\r\n- I funghi porcini sono cotti con attenzione, unendosi al piatto con un tocco di Marsala e aglio, creando un connubio <br>\r\nperfetto di sapori.<br>\r\n- Le briciole di pane, grattugiate grossolanamente e croccanti, sono preparate con cura per aggiungere una dimensione <br>\r\navvolgente al piatto.<br><br>\r\nPresentazione Sofisticata:<br>\r\n- Gli ingredienti di eccellenza sono disposti con eleganza, creando un'armonia visiva sul piatto.<br>\r\n- Le pepite d'oro dei tagliolini sono celebrate dalla crema di zucca che li avvolge con grazia.<br>\r\n- I funghi porcini, distribuiti con precisione, aggiungono un tocco di colore e profondità.<br>\r\n- Le briciole di pane, delicatamente posizionate, completano la presentazione con un elemento croccante e raffinato.<br><br>\r\nUn'Opera Culinaria da Due Stelle Michelin:<br>\r\nQuesti Tagliolini d'Oro Autunnali sono una sinfonia di gusti e presentazioni, un'opera culinaria che fonde ingredienti<br>\r\ndi eccellenza con un'attenzione raffinata all'esecuzione e una presentazione sofisticata. Un'esperienza gastronomica che<br>\r\ntrasforma il pane in oro e la zucca in pura poesia culinaria risaltando la dieta vegana."	Vegani	40	media/piatti/TaglioliniDOro.png
Farfalle alla Carbonara di Zucchine	Farfalle, una selezione di pasta he incarna la tradizione italiana.\r\n    Zucchine fresch tagliate con precisione per una consistenza tenera e avvolgente.\r\n    Panna vegana garanzia di cremosità e delicatezza.\r\n    formaggio di setan per un tocco di sapore avvolgente.\r\n    Olio Extravergine d'Oliva di Alta Qualità, dosato con cura per una nota di ricchezza.\r\n    Sale e Pepe Nero macinati al momento, per un equilibrio perfetto di sapori.	Questa pietanza è un trionfo di sapore italiano. La pasta, accarezzata dalla cremosa\r\n    crema di sapori vegani freschissimi, si unisce alle zucchine tenere e\r\n    avvolgenti. Un'esperienza gastronomica inclusiva, dove la freschezza\r\n    della zucchina sposa la cremosità del setan, creando una sinfonia di sapori in ogni boccone.	Esecuzione Raffinata:<br>\r\n- Le Farfalle sono cotte al dente, mantenendo la loro texture artigianale.<br>\r\n- Le zucchine, tagliate con maestria, sono preparate con un tocco di olio extravergine d'oliva per accentuarne la dolcezza.<br>\r\n- la panna vegana, miscelata con formaggio di setan , creano una crema vellutata che avvolge la pasta con eleganza.<br><br>\r\nPresentazione Sofisticata:<br>\r\n- Le farfalle sono disposte con grazia, abbracciate dalla crema di zucchine e carbonara.<br>\r\n- Una leggera spolverata di pepe nero completa la presentazione, anticipando il carattere avvolgente dei sapori.<br>\r\n- Il piatto è arricchito da un filo di olio extravergine d'oliva, sottolineando la prelibatezza dell'italianità.<br><br>\r\nUn'Esperienza Inclusiva:<br>\r\nLa Delizia Verde è un inno all'inclusività, una reinterpretazione della classica carbonara adatta anche per i vegetariani. Un <br>\r\npiatto che celebra l'eleganza e la ricchezza dei sapori italiani, offrendo un'esperienza culinaria raffinata e accogliente per tutti.	Vegani	45	media/piatti/farfalleVerdiEDorate.png
Eleganza del Bosco	Pappardelle fresche, cavolfiori, gorgonzola, aglio, timo, olio, burro, scaglie di formaggio grattugiato, latte, sale e pepe	Un'armoniosa sinfonia di sapori italiani, è un connubio sublime di pasta all'uovo,\r\n    funghi porcini succulenti e speck sapido. La cremosa fusione con panna fresca conferisce un\r\n    tocco di velluto, mentre il prezzemolo fresco e il pepe nero aggiungono eleganza.	Pappardelle in Sinfonia di Pasta Fresca:<br>\r\nLe pappardelle, arrotolate con cura su un piatto di porcellana bianca, sono una sinfonia di pasta fresca che incanta la vista. La loro<br>\r\nlarghezza e consistenza al dente sono il preludio a un'esperienza gustativa unica.<br><br>\r\nCavolfiori in Vestito d'Eleganza:<br>\r\nI cavolfiori, tagliati con precisione, si presentano come piccoli fiori imbiancati che adornano le pappardelle. Il loro sapore dolce<br>\r\ne la consistenza delicata creano un contrasto piacevole con la pasta, aggiungendo un tocco di freschezza autunnale.<br><br>\r\nIl Cuore Cremoso:<br>\r\nLa crema di gorgonzola, preparata con cura, è il cuore cremoso che avvolge le pappardelle. Arricchita da aglio e timo, <br>\r\noffre un equilibrio di sapori intensi e aromatici. Il formaggio grattugiato completa la composizione con la sua complessità, <br>\r\nmentre il latte conferisce una cremosità avvolgente.	Bianchi	55	media/piatti/eleganzaDelBosco.png
Armonia Montana	trofie fresche, fette di speck, gherigli di noce, ricotta vaccina, rametto di rosmarino, olio extravergine di oliva, Sale e pepe nero, Semi di papavero.	Trofie con Speck, Noci e Sinfonia di Ricotta è un'ode ai sapori della natura\r\n    che si fondono in un'armonia di consistenze e sfumature. Un piatto che\r\n    trasporta gli ospiti in un viaggio gastronomico tra le vette, arricchendo\r\n    il palato con la diversità dei sapori alpini.	Eleganza Trofiosa:<br>\r\nLe trofie, disposte con precisione su un piatto di porcellana, si presentano come piccoli tesori di pasta, pronti a intrecciarsi<br>\r\ncon i sapori della montagna. La loro forma curva cattura la luce, anticipando un'esperienza di gusto avvolgente.<br><br>\r\nSpeck Affumicato: Un Viaggio nei Boschi:<br>\r\nLo speck, affettato sottilmente, si adagia con eleganza sul letto di trofie. La sua affumicatura intensa evoca i profumi <br>\r\ndei boschi alpini, mentre la sua consistenza delicata si fonde armoniosamente con la pasta.<br><br>\r\nGherigli di Noce: Croccantezza Terrosa:<br>\r\nI gherigli di noce, tostati con cura, aggiungono una croccantezza terrosa che contrasta con la morbidezza della ricotta. Ogni morso<br>\r\nè arricchito da questa nota croccante, creando una sinfonia di consistenze.<br><br>\r\nRicotta Vaccina: Sinfonia Cremosa:<br>\r\nLa ricotta vaccina, cremosa e avvolgente, è la protagonista che lega gli elementi. La sua dolcezza delicata svela strati di <br>\r\ngusto, mentre il rosmarino aggiunge una freschezza erbacea che eleva il piatto a un'esperienza sensoriale unica.	Bianchi	55	media/piatti/armoniaMontana.png
Fettuccine al Tartufo	Fettuccine all'uovo, tartufo nero, aglio fresco, olio extravergine d'oliva di prima qualità, burro locale.	Le fettuccine all'uovo fatte a mano avvolgenti sposano l'eleganza del tartufo, arricchite\r\n      da aglio fresco, olio extravergine d'oliva di prima qualità e burro locale.\r\n      Un'esperienza gustativa unica che unisce la tradizione italiana all'autenticità\r\n      dei prodotti locali, offrendo un viaggio culinario esclusivo e sostenibile.	Eleganza Sensoriale:<br>\r\nIl tartufo nero, con la sua fragranza inconfondibile, si amalgama con le fettuccine avvolgenti, creando un'esperienza gustativa unica.<br>\r\nUn tocco di aglio, olio extravergine d'oliva e burro aggiunge complessità, mentre il sale esalta ogni sfumatura di gusto.<br><br>\r\nL'Autenticità dei Prodotti a Km 0:<br>\r\nImmergetevi in un viaggio culinario dove la pasta fatta a mano incontra il tartufo pregiato e gli ingredienti locali, sottolineando<br>\r\nil nostro impegno per la sostenibilità e la qualità a km 0.<br><br>\r\nPresentazione Esclusiva:<br>\r\nServite con un tocco di maestria, le Fettuccine al Tartufo sono decorate con scaglie di tartufo fresco, offrendo un'opulenza visiva che <br>\r\nanticipa il lusso di ogni boccone.<br><br>\r\nUn'Esperienza Gastronomica Indimenticabile:<br>\r\nDeliziate il vostro palato con un piatto che celebra la tradizione italiana, l'autenticità dei prodotti locali e l'eleganza culinaria. <br>\r\nLe Fettuccine al Tartufo sono un inno al gusto e alla sostenibilità, un'esperienza gastronomica che incarna il meglio della nostra cucina <br>\r\nraffinata.	Bianchi	45	media/piatti/fettuccineAlTartufo.png
Pappardelle alla Crema di Gorgonzola	Pappardelle all'uovo, funghi Porcini, speck affettato spesso, panna Fresca Liquida, Prezzemolo fresco.	Le pappardelle affascinate dalla crema di gorgonzola con cavolfiori in vestito\r\n      d'eleganza offrono un'esplosione di gusto che cattura l'essenza della tradizione Lombarda e\r\n      Piemontese. Un'autentica delizia culinaria che eleva l'esperienza\r\n      gastronomica a nuove vette.	Esecuzione Raffinata:<br>\r\n- Le Pappardelle, all'uovo e fatte a mano, sono cotte al punto giusto, preservando la loro texture artigianale.<br>\r\n- I Funghi Porcini, preparati con cura, si fondono con uno spicchio d'aglio e olio extravergine d'oliva per una base aromatica.<br>\r\n- Lo Speck, affettato spesso, è cotto con maestria, aggiungendo una nota di sapore affumicato.<br>\r\n- La Panna Fresca Liquida è dosata con precisione, creando una crema avvolgente che lega il piatto.<br><br>\r\n<br>Presentazione Sofisticata:<br>\r\n- Le pappardelle sono arrotolate con grazia, abbracciando il condimento di funghi porcini e speck.<br>\r\n- Il prezzemolo fresco, posato con eleganza, aggiunge un tocco di colore e fragranza al piatto.<br>\r\n- Una spolverata di pepe nero completa la presentazione, anticipando il carattere avvolgente dei sapori.<br><br>\r\nUn Viaggio Gastronomico Raffinato:<br>\r\nLe Pappardelle Eleganza Bosco sono un'ode all'italianità e all'eleganza culinaria. Un piatto che celebra la tradizione delle<br>\r\npappardelle fatte a mano, accogliendo il sapore avvolgente dei funghi porcini e lo speck sapido. Un'esperienza gastronomica <br>\r\ndove ogni boccone è un viaggio nei sapori autentici dell'Italia.	Bianchi	55	media/piatti/pappardelleAllaGorgonzola.png
Spaghetti alla Carbonara	pasta artigianale, guancuale croccante, uova a km0, pecorino romano D.O.P., pepe nero macinato al momento	Un'opera d'arte culinaria dello chef, con pasta al dente avvolta in una crema di uovo, pecorino e guanciale croccante, esaltata da una pioggia di pepe nero appena macinato.	Ingredienti di Eccellenza:<br>\r\n- Pasta artigianale con spaghetti al dente, selezionati con cura.<br>\r\n- Guanciale croccanteperfezione salata, per un tocco di autenticità.<br>\r\n- Sei tuorli di uova medie, donando cremosità e rotondità al piatto.<br>\r\n- Pecorino romano, grattugiati al momento, per una nota di robustezza.<br>\r\n- Pepe nero macinato al momento, per la pungente eleganza che completa ogni boccone.<br><br>\r\nEsecuzione Raffinata:<br>\r\n- La pasta, lavorata con maestria, è cotta al dente per conservarne la consistenza artigianale.<br>\r\n- Il guanciale è preparato con precisione, aggiungendo un tocco croccante e saporito.<br>\r\n- I tuorli sono incorporati con cura, creando una crema avvolgente senza eguali.<br>\r\n- Il pecorino romano, grattugiato al momento, si fonde armoniosamente con la pasta.<br>\r\n- Il pepe nero, macinato al momento, è dosato con perizia per esaltare ogni sfumatura di gusto.<br><br>\r\nPresentazione Sofisticata:<br>\r\n- Gli spaghetti, decorati con guanciale croccante, sono disposti con eleganza sul piatto.<br>\r\n- La crema di tuorli avvolge la pasta, creando un contrasto visivo e gustativo.<br>\r\n- Il pecorino romano, sospeso tra i fili di spaghetti, offre un'opulenza visiva.<br>\r\n- Una leggera spolverata di pepe nero completa la presentazione, anticipando la complessità dei sapori.<br><br>\r\nUn'Esperienza Gastronomica di Classe:<br>\r\nI nostri Spaghetti alla Carbonara incarnano la perfezione della cucina italiana, dagli ingredienti al piatto.<br>\r\nUn'esperienza culinaria che unisce la tradizione alla raffinatezza, invitandovi a gustare \r\nl'autentica eccellenza italiana.	Classici	50	media/piatti/carbonara.png
Piatto Piccolo di Ravioli con Pomodoro e Guanciale	Ravioli, Pomodoro, Guanciale	\N	\N	Piatto personalizzato	150	\N
Piatto Piccolo di Ravioli con Pomodoro e Avocado	Ravioli, Pomodoro, Avocado	\N	\N	Piatto personalizzato	150	\N
Piatto Piccolo di Ravioli con Pomodoro e Noci	Ravioli, Pomodoro, Noci	\N	\N	Piatto personalizzato	150	\N
Piatto Piccolo di Ravioli con Panna e Guanciale	Ravioli, Panna, Guanciale	\N	\N	Piatto personalizzato	150	\N
Piatto Grande di Orecchiette con Panna e Noci	Orecchiette, Panna, Noci	\N	\N	Piatto personalizzato	150	\N
Piatto Piccolo di Orecchiette con Panna e Noci	Orecchiette, Panna, Noci	\N	\N	Piatto personalizzato	150	\N
Piatto Grande di Tagliatelle con Pomodoro e Guanciale	Tagliatelle, Pomodoro, Guanciale	\N	\N	Piatto personalizzato	150	\N
Piatto Medio di Orecchiette con Pomodoro e Guanciale	Orecchiette, Pomodoro, Guanciale	\N	\N	Piatto personalizzato	150	\N
Piatto Piccolo di Orecchiette con Pesto e Guanciale	Orecchiette, Pesto, Guanciale	\N	\N	Piatto personalizzato	150	\N
Piatto Medio di Orecchiette con Panna e Guanciale	Orecchiette, Panna, Guanciale	\N	\N	Piatto personalizzato	150	\N
Piatto Grande di Orecchiette con Panna e Guanciale	Orecchiette, Panna, Guanciale	\N	\N	Piatto personalizzato	150	\N
Piatto Medio di Tagliatelle con Pesto e Noci	Tagliatelle, Pesto, Noci	\N	\N	Piatto personalizzato	150	\N
Piatto Grande di Orecchiette con Pesto e Noci	Orecchiette, Pesto, Noci	\N	\N	Piatto personalizzato	150	\N
Piatto Medio di Ravioli con Panna e Avocado	Ravioli, Panna, Avocado	\N	\N	Piatto personalizzato	150	\N
Rosso Rubino e Verde Sinfonia	spaghetti di farro filamenti d'arte culinaria, barbabietole come rubini dolci che impreziosiscono il piatto, mandorle tostate croccanti gemme d'energia, parmigiano grattugiato che è il tocco di nobiltà che svela complessità, olio extravergine di oliva liquido d'oro che lega gli elementi, foglie di basilico la sinfonia verde che danza nel pesto, Succo di limone il tocco citrico che esalta ogni sfumatura.	Questo capolavoro è un inno all'equilibrio cromatico e gustativo. Un piatto che celebra la freschezza del verde e la profondità del rosso, offrendo un'esperienza culinaria che delizia gli occhi e conquista il palato. Un'opera d'arte gastronomica destinata a brillare sul palcoscenico di un ristorante prestigioso.	Presentazione Raffinata:<br>\r\nGli spaghetti di farro, arrotolati con cura, compongono un nido elegante su un piatto di porcellana. Le barbabietole, <br>\r\ntagliate con precisione, emergono come gemme rubino su questo dipinto culinario. Il pesto di mandorle, con il suo colorito<br>\r\nverde vivace, avvolge gli spaghetti con grazia, creando un contrasto visivo che invita all'assaggio.<br><br>\r\nUn Viaggio nel Gusto:<br>\r\nIl primo morso svela la consistenza rustica degli spaghetti di farro, intrisi del sapore dolce e vibrante delle barbabietole.<br>\r\nIl pesto di mandorle, arricchito dal basilico e dal parmigiano, esplode in una sinfonia di aromi, mentre l'olio extravergine<br>\r\ndi oliva completa l'esperienza con la sua morbidezza avvolgente. Il succo di limone, con la sua nota fresca, aggiunge una dimensione<br>\r\ncitrica che eleva il piatto a un'esperienza sensoriale completa.	Rossi	100	media/piatti/rubinoRosso.png
\.


--
-- Data for Name: newsletter; Type: TABLE DATA; Schema: public; Owner: www
--

COPY public.newsletter (email) FROM stdin;
francescopio.cirillo@libero.it
\.


--
-- Data for Name: ordinazioni; Type: TABLE DATA; Schema: public; Owner: www
--

COPY public.ordinazioni (id, email, total, tipo_spedizione) FROM stdin;
39	francescopio.cirillo@libero.it	3095	LAMPO
40	francescopio.cirillo@libero.it	3400	LAMPO
41	francescopio.cirillo@libero.it	3685	LAMPO
42	francescopio.cirillo@libero.it	1840	BASE
\.


--
-- Data for Name: ordinazioni_elementi; Type: TABLE DATA; Schema: public; Owner: www
--

COPY public.ordinazioni_elementi (id_ordinazione, quantita, subtotale, piatto) FROM stdin;
39	1	50	Spaghettoni con le Sarde
39	1	45	Spaghetti Cacio e Pepe
40	1	55	Pasta alla Norma
40	1	45	Spaghetti Cacio e Pepe
40	3	150	Spaghettoni con le Sarde
40	1	150	Piatto Grande di Orecchiette con Panna e Guanciale
41	1	55	Pasta alla Norma
41	1	150	Piatto Medio di Tagliatelle con Pesto e Noci
41	4	180	Spaghetti Cacio e Pepe
41	3	150	Spaghettoni con le Sarde
41	1	150	Piatto Grande di Orecchiette con Pesto e Noci
42	1	50	Spaghettoni con le Sarde
42	1	55	Pasta alla Norma
42	3	135	Spaghetti Cacio e Pepe
42	1	150	Piatto Medio di Ravioli con Panna e Avocado
42	1	150	Piatto Piccolo di Ravioli con Pomodoro e Noci
42	2	300	Piatto Piccolo di Ravioli con Pomodoro e Guanciale
\.


--
-- Data for Name: utenti; Type: TABLE DATA; Schema: public; Owner: www
--

COPY public.utenti (email, password, nome, cognome, genere, nazione, citta, via, civico, telefono) FROM stdin;
mariorossi@gmail.com	$2y$10$f27xPjUCD4m4UwrNVYUeWuoJg2L9tXJUuugHOIpNOSouLbsllRa1i	Mario	Rossi	M	It	Castellammare	Pandola	2	9876543210
francescopio.cirillo@libero.it	$2y$10$klJK7ImHJ7iUtaVT/79pMugvdx5Dv9Fhge8H/0GJVUhF1HcTDazva	Francesco	Cirillo	M	Italia	Castellammare	Delle Puglie	1	0818718985
\.


--
-- Name: ordinazioni_elementi_id_ordinazione_seq; Type: SEQUENCE SET; Schema: public; Owner: www
--

SELECT pg_catalog.setval('public.ordinazioni_elementi_id_ordinazione_seq', 1, false);


--
-- Name: ordinazioni_id_seq; Type: SEQUENCE SET; Schema: public; Owner: www
--

SELECT pg_catalog.setval('public.ordinazioni_id_seq', 42, true);


--
-- Name: carrello Cart_pkey; Type: CONSTRAINT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.carrello
    ADD CONSTRAINT "Cart_pkey" PRIMARY KEY (piatto, email);


--
-- Name: menu Menu_pkey; Type: CONSTRAINT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.menu
    ADD CONSTRAINT "Menu_pkey" PRIMARY KEY (nome);


--
-- Name: newsletter newsletter_pkey; Type: CONSTRAINT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.newsletter
    ADD CONSTRAINT newsletter_pkey PRIMARY KEY (email);


--
-- Name: ordinazioni_elementi ordinazioni_elementi_pkey; Type: CONSTRAINT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.ordinazioni_elementi
    ADD CONSTRAINT ordinazioni_elementi_pkey PRIMARY KEY (id_ordinazione, piatto);


--
-- Name: ordinazioni ordinazioni_pkey; Type: CONSTRAINT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.ordinazioni
    ADD CONSTRAINT ordinazioni_pkey PRIMARY KEY (id);


--
-- Name: utenti utenti_pkey; Type: CONSTRAINT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.utenti
    ADD CONSTRAINT utenti_pkey PRIMARY KEY (email);


--
-- Name: ordinazioni_elementi RelazioniIDOrdineNomePiatto; Type: FK CONSTRAINT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.ordinazioni_elementi
    ADD CONSTRAINT "RelazioniIDOrdineNomePiatto" FOREIGN KEY (id_ordinazione) REFERENCES public.ordinazioni(id);


--
-- Name: ordinazioni autoreOrdine; Type: FK CONSTRAINT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.ordinazioni
    ADD CONSTRAINT "autoreOrdine" FOREIGN KEY (email) REFERENCES public.utenti(email);


--
-- Name: carrello prodotto; Type: FK CONSTRAINT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.carrello
    ADD CONSTRAINT prodotto FOREIGN KEY (piatto) REFERENCES public.menu(nome);


--
-- Name: carrello utente; Type: FK CONSTRAINT; Schema: public; Owner: www
--

ALTER TABLE ONLY public.carrello
    ADD CONSTRAINT utente FOREIGN KEY (email) REFERENCES public.utenti(email);


--
-- PostgreSQL database dump complete
--

