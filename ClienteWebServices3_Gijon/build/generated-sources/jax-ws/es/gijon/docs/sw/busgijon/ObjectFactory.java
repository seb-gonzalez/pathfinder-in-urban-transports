
package es.gijon.docs.sw.busgijon;

import javax.xml.bind.JAXBElement;
import javax.xml.bind.annotation.XmlElementDecl;
import javax.xml.bind.annotation.XmlRegistry;
import javax.xml.namespace.QName;


/**
 * This object contains factory methods for each 
 * Java content interface and Java element interface 
 * generated in the es.gijon.docs.sw.busgijon package. 
 * <p>An ObjectFactory allows you to programatically 
 * construct new instances of the Java representation 
 * for XML content. The Java representation of XML 
 * content can consist of schema derived interfaces 
 * and classes representing the binding of schema 
 * type definitions, element declarations and model 
 * groups.  Factory methods for each of these are 
 * provided in this class.
 * 
 */
@XmlRegistry
public class ObjectFactory {

    private final static QName _Autobus_QNAME = new QName("http://docs.gijon.es/sw/busgijon.asmx", "autobus");
    private final static QName _Posiciones_QNAME = new QName("http://docs.gijon.es/sw/busgijon.asmx", "posiciones");
    private final static QName _Trayectos_QNAME = new QName("http://docs.gijon.es/sw/busgijon.asmx", "trayectos");
    private final static QName _Paradas_QNAME = new QName("http://docs.gijon.es/sw/busgijon.asmx", "paradas");
    private final static QName _Linea_QNAME = new QName("http://docs.gijon.es/sw/busgijon.asmx", "linea");
    private final static QName _Paradastrayecto_QNAME = new QName("http://docs.gijon.es/sw/busgijon.asmx", "paradastrayecto");
    private final static QName _Vialestrayectolinea_QNAME = new QName("http://docs.gijon.es/sw/busgijon.asmx", "vialestrayectolinea");
    private final static QName _Llegadas_QNAME = new QName("http://docs.gijon.es/sw/busgijon.asmx", "llegadas");
    private final static QName _Lineas_QNAME = new QName("http://docs.gijon.es/sw/busgijon.asmx", "lineas");
    private final static QName _Salidadeautobuses_QNAME = new QName("http://docs.gijon.es/sw/busgijon.asmx", "salidadeautobuses");
    private final static QName _Autobuses_QNAME = new QName("http://docs.gijon.es/sw/busgijon.asmx", "autobuses");
    private final static QName _Infoparadas_QNAME = new QName("http://docs.gijon.es/sw/busgijon.asmx", "infoparadas");
    private final static QName _Horarios_QNAME = new QName("http://docs.gijon.es/sw/busgijon.asmx", "horarios");
    private final static QName _Salidascabeberas_QNAME = new QName("http://docs.gijon.es/sw/busgijon.asmx", "salidascabeberas");

    /**
     * Create a new ObjectFactory that can be used to create new instances of schema derived classes for package: es.gijon.docs.sw.busgijon
     * 
     */
    public ObjectFactory() {
    }

    /**
     * Create an instance of {@link InfoParada }
     * 
     */
    public InfoParada createInfoParada() {
        return new InfoParada();
    }

    /**
     * Create an instance of {@link Lineas }
     * 
     */
    public Lineas createLineas() {
        return new Lineas();
    }

    /**
     * Create an instance of {@link VialesTrayectoBus }
     * 
     */
    public VialesTrayectoBus createVialesTrayectoBus() {
        return new VialesTrayectoBus();
    }

    /**
     * Create an instance of {@link LlegadasBus }
     * 
     */
    public LlegadasBus createLlegadasBus() {
        return new LlegadasBus();
    }

    /**
     * Create an instance of {@link Trayectos }
     * 
     */
    public Trayectos createTrayectos() {
        return new Trayectos();
    }

    /**
     * Create an instance of {@link Horarios }
     * 
     */
    public Horarios createHorarios() {
        return new Horarios();
    }

    /**
     * Create an instance of {@link EstadoBusResponse }
     * 
     */
    public EstadoBusResponse createEstadoBusResponse() {
        return new EstadoBusResponse();
    }

    /**
     * Create an instance of {@link EstadoAutobusBus }
     * 
     */
    public EstadoAutobusBus createEstadoAutobusBus() {
        return new EstadoAutobusBus();
    }

    /**
     * Create an instance of {@link TrayectosBus }
     * 
     */
    public TrayectosBus createTrayectosBus() {
        return new TrayectosBus();
    }

    /**
     * Create an instance of {@link ParadasBus }
     * 
     */
    public ParadasBus createParadasBus() {
        return new ParadasBus();
    }

    /**
     * Create an instance of {@link InfoParadas }
     * 
     */
    public InfoParadas createInfoParadas() {
        return new InfoParadas();
    }

    /**
     * Create an instance of {@link EstadoLineaResponse }
     * 
     */
    public EstadoLineaResponse createEstadoLineaResponse() {
        return new EstadoLineaResponse();
    }

    /**
     * Create an instance of {@link EstadoLineaBus }
     * 
     */
    public EstadoLineaBus createEstadoLineaBus() {
        return new EstadoLineaBus();
    }

    /**
     * Create an instance of {@link EstadoParadaResponse }
     * 
     */
    public EstadoParadaResponse createEstadoParadaResponse() {
        return new EstadoParadaResponse();
    }

    /**
     * Create an instance of {@link EstadoParadaBus }
     * 
     */
    public EstadoParadaBus createEstadoParadaBus() {
        return new EstadoParadaBus();
    }

    /**
     * Create an instance of {@link PosicionesBus }
     * 
     */
    public PosicionesBus createPosicionesBus() {
        return new PosicionesBus();
    }

    /**
     * Create an instance of {@link HorariosBus }
     * 
     */
    public HorariosBus createHorariosBus() {
        return new HorariosBus();
    }

    /**
     * Create an instance of {@link Posiciones }
     * 
     */
    public Posiciones createPosiciones() {
        return new Posiciones();
    }

    /**
     * Create an instance of {@link SalidasCabecerasResponse }
     * 
     */
    public SalidasCabecerasResponse createSalidasCabecerasResponse() {
        return new SalidasCabecerasResponse();
    }

    /**
     * Create an instance of {@link SalidasCabecerasBus }
     * 
     */
    public SalidasCabecerasBus createSalidasCabecerasBus() {
        return new SalidasCabecerasBus();
    }

    /**
     * Create an instance of {@link InfoParadasBus }
     * 
     */
    public InfoParadasBus createInfoParadasBus() {
        return new InfoParadasBus();
    }

    /**
     * Create an instance of {@link VialesTrayecto }
     * 
     */
    public VialesTrayecto createVialesTrayecto() {
        return new VialesTrayecto();
    }

    /**
     * Create an instance of {@link VialesTrayectoResponse }
     * 
     */
    public VialesTrayectoResponse createVialesTrayectoResponse() {
        return new VialesTrayectoResponse();
    }

    /**
     * Create an instance of {@link EstadoCabeceraSalidasResponse }
     * 
     */
    public EstadoCabeceraSalidasResponse createEstadoCabeceraSalidasResponse() {
        return new EstadoCabeceraSalidasResponse();
    }

    /**
     * Create an instance of {@link EstadoParadaSalidaBus }
     * 
     */
    public EstadoParadaSalidaBus createEstadoParadaSalidaBus() {
        return new EstadoParadaSalidaBus();
    }

    /**
     * Create an instance of {@link LlegadasParadas }
     * 
     */
    public LlegadasParadas createLlegadasParadas() {
        return new LlegadasParadas();
    }

    /**
     * Create an instance of {@link LineasBus }
     * 
     */
    public LineasBus createLineasBus() {
        return new LineasBus();
    }

    /**
     * Create an instance of {@link HorariosResponse }
     * 
     */
    public HorariosResponse createHorariosResponse() {
        return new HorariosResponse();
    }

    /**
     * Create an instance of {@link ParadasTrayectos }
     * 
     */
    public ParadasTrayectos createParadasTrayectos() {
        return new ParadasTrayectos();
    }

    /**
     * Create an instance of {@link TrayectosResponse }
     * 
     */
    public TrayectosResponse createTrayectosResponse() {
        return new TrayectosResponse();
    }

    /**
     * Create an instance of {@link ParadasTrayectosBus }
     * 
     */
    public ParadasTrayectosBus createParadasTrayectosBus() {
        return new ParadasTrayectosBus();
    }

    /**
     * Create an instance of {@link EstadoCabeceraSalidas }
     * 
     */
    public EstadoCabeceraSalidas createEstadoCabeceraSalidas() {
        return new EstadoCabeceraSalidas();
    }

    /**
     * Create an instance of {@link ParadasTrayectosResponse }
     * 
     */
    public ParadasTrayectosResponse createParadasTrayectosResponse() {
        return new ParadasTrayectosResponse();
    }

    /**
     * Create an instance of {@link Paradas }
     * 
     */
    public Paradas createParadas() {
        return new Paradas();
    }

    /**
     * Create an instance of {@link EstadoLinea }
     * 
     */
    public EstadoLinea createEstadoLinea() {
        return new EstadoLinea();
    }

    /**
     * Create an instance of {@link PosicionesResponse }
     * 
     */
    public PosicionesResponse createPosicionesResponse() {
        return new PosicionesResponse();
    }

    /**
     * Create an instance of {@link EstadoBus }
     * 
     */
    public EstadoBus createEstadoBus() {
        return new EstadoBus();
    }

    /**
     * Create an instance of {@link InfoParadasResponse }
     * 
     */
    public InfoParadasResponse createInfoParadasResponse() {
        return new InfoParadasResponse();
    }

    /**
     * Create an instance of {@link ParadasResponse }
     * 
     */
    public ParadasResponse createParadasResponse() {
        return new ParadasResponse();
    }

    /**
     * Create an instance of {@link LineasResponse }
     * 
     */
    public LineasResponse createLineasResponse() {
        return new LineasResponse();
    }

    /**
     * Create an instance of {@link SalidasCabeceras }
     * 
     */
    public SalidasCabeceras createSalidasCabeceras() {
        return new SalidasCabeceras();
    }

    /**
     * Create an instance of {@link EstadoParada }
     * 
     */
    public EstadoParada createEstadoParada() {
        return new EstadoParada();
    }

    /**
     * Create an instance of {@link LlegadasParadasResponse }
     * 
     */
    public LlegadasParadasResponse createLlegadasParadasResponse() {
        return new LlegadasParadasResponse();
    }

    /**
     * Create an instance of {@link AutobusBus }
     * 
     */
    public AutobusBus createAutobusBus() {
        return new AutobusBus();
    }

    /**
     * Create an instance of {@link TrayectoLineaBus }
     * 
     */
    public TrayectoLineaBus createTrayectoLineaBus() {
        return new TrayectoLineaBus();
    }

    /**
     * Create an instance of {@link ArrayOfAutobusTrayectoBus }
     * 
     */
    public ArrayOfAutobusTrayectoBus createArrayOfAutobusTrayectoBus() {
        return new ArrayOfAutobusTrayectoBus();
    }

    /**
     * Create an instance of {@link ArrayOfInfoParada }
     * 
     */
    public ArrayOfInfoParada createArrayOfInfoParada() {
        return new ArrayOfInfoParada();
    }

    /**
     * Create an instance of {@link ParadaAutobusTrayectoBus }
     * 
     */
    public ParadaAutobusTrayectoBus createParadaAutobusTrayectoBus() {
        return new ParadaAutobusTrayectoBus();
    }

    /**
     * Create an instance of {@link LlegadaBus }
     * 
     */
    public LlegadaBus createLlegadaBus() {
        return new LlegadaBus();
    }

    /**
     * Create an instance of {@link LineaBus }
     * 
     */
    public LineaBus createLineaBus() {
        return new LineaBus();
    }

    /**
     * Create an instance of {@link ParadaBus }
     * 
     */
    public ParadaBus createParadaBus() {
        return new ParadaBus();
    }

    /**
     * Create an instance of {@link ArrayOfTrayectoLineaBus }
     * 
     */
    public ArrayOfTrayectoLineaBus createArrayOfTrayectoLineaBus() {
        return new ArrayOfTrayectoLineaBus();
    }

    /**
     * Create an instance of {@link HoraBus }
     * 
     */
    public HoraBus createHoraBus() {
        return new HoraBus();
    }

    /**
     * Create an instance of {@link Coordenada }
     * 
     */
    public Coordenada createCoordenada() {
        return new Coordenada();
    }

    /**
     * Create an instance of {@link PosicionBus }
     * 
     */
    public PosicionBus createPosicionBus() {
        return new PosicionBus();
    }

    /**
     * Create an instance of {@link EstadoParadasBus }
     * 
     */
    public EstadoParadasBus createEstadoParadasBus() {
        return new EstadoParadasBus();
    }

    /**
     * Create an instance of {@link TrayectoBus }
     * 
     */
    public TrayectoBus createTrayectoBus() {
        return new TrayectoBus();
    }

    /**
     * Create an instance of {@link ArrayOfEstadoParadasBus }
     * 
     */
    public ArrayOfEstadoParadasBus createArrayOfEstadoParadasBus() {
        return new ArrayOfEstadoParadasBus();
    }

    /**
     * Create an instance of {@link ArrayOfSalida }
     * 
     */
    public ArrayOfSalida createArrayOfSalida() {
        return new ArrayOfSalida();
    }

    /**
     * Create an instance of {@link ArrayOfCoordenada }
     * 
     */
    public ArrayOfCoordenada createArrayOfCoordenada() {
        return new ArrayOfCoordenada();
    }

    /**
     * Create an instance of {@link Salida }
     * 
     */
    public Salida createSalida() {
        return new Salida();
    }

    /**
     * Create an instance of {@link AutobusTrayectoBus }
     * 
     */
    public AutobusTrayectoBus createAutobusTrayectoBus() {
        return new AutobusTrayectoBus();
    }

    /**
     * Create an instance of {@link ParadaTrayectoBus }
     * 
     */
    public ParadaTrayectoBus createParadaTrayectoBus() {
        return new ParadaTrayectoBus();
    }

    /**
     * Create an instance of {@link AutobusSalidaBus }
     * 
     */
    public AutobusSalidaBus createAutobusSalidaBus() {
        return new AutobusSalidaBus();
    }

    /**
     * Create an instance of {@link ArrayOfParadaAutobusTrayectoBus }
     * 
     */
    public ArrayOfParadaAutobusTrayectoBus createArrayOfParadaAutobusTrayectoBus() {
        return new ArrayOfParadaAutobusTrayectoBus();
    }

    /**
     * Create an instance of {@link InfoParada.Texto }
     * 
     */
    public InfoParada.Texto createInfoParadaTexto() {
        return new InfoParada.Texto();
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link EstadoAutobusBus }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://docs.gijon.es/sw/busgijon.asmx", name = "autobus")
    public JAXBElement<EstadoAutobusBus> createAutobus(EstadoAutobusBus value) {
        return new JAXBElement<EstadoAutobusBus>(_Autobus_QNAME, EstadoAutobusBus.class, null, value);
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link PosicionesBus }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://docs.gijon.es/sw/busgijon.asmx", name = "posiciones")
    public JAXBElement<PosicionesBus> createPosiciones(PosicionesBus value) {
        return new JAXBElement<PosicionesBus>(_Posiciones_QNAME, PosicionesBus.class, null, value);
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link TrayectosBus }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://docs.gijon.es/sw/busgijon.asmx", name = "trayectos")
    public JAXBElement<TrayectosBus> createTrayectos(TrayectosBus value) {
        return new JAXBElement<TrayectosBus>(_Trayectos_QNAME, TrayectosBus.class, null, value);
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link ParadasBus }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://docs.gijon.es/sw/busgijon.asmx", name = "paradas")
    public JAXBElement<ParadasBus> createParadas(ParadasBus value) {
        return new JAXBElement<ParadasBus>(_Paradas_QNAME, ParadasBus.class, null, value);
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link EstadoLineaBus }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://docs.gijon.es/sw/busgijon.asmx", name = "linea")
    public JAXBElement<EstadoLineaBus> createLinea(EstadoLineaBus value) {
        return new JAXBElement<EstadoLineaBus>(_Linea_QNAME, EstadoLineaBus.class, null, value);
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link ParadasTrayectosBus }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://docs.gijon.es/sw/busgijon.asmx", name = "paradastrayecto")
    public JAXBElement<ParadasTrayectosBus> createParadastrayecto(ParadasTrayectosBus value) {
        return new JAXBElement<ParadasTrayectosBus>(_Paradastrayecto_QNAME, ParadasTrayectosBus.class, null, value);
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link VialesTrayectoBus }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://docs.gijon.es/sw/busgijon.asmx", name = "vialestrayectolinea")
    public JAXBElement<VialesTrayectoBus> createVialestrayectolinea(VialesTrayectoBus value) {
        return new JAXBElement<VialesTrayectoBus>(_Vialestrayectolinea_QNAME, VialesTrayectoBus.class, null, value);
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link LlegadasBus }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://docs.gijon.es/sw/busgijon.asmx", name = "llegadas")
    public JAXBElement<LlegadasBus> createLlegadas(LlegadasBus value) {
        return new JAXBElement<LlegadasBus>(_Llegadas_QNAME, LlegadasBus.class, null, value);
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link LineasBus }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://docs.gijon.es/sw/busgijon.asmx", name = "lineas")
    public JAXBElement<LineasBus> createLineas(LineasBus value) {
        return new JAXBElement<LineasBus>(_Lineas_QNAME, LineasBus.class, null, value);
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link EstadoParadaSalidaBus }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://docs.gijon.es/sw/busgijon.asmx", name = "salidadeautobuses")
    public JAXBElement<EstadoParadaSalidaBus> createSalidadeautobuses(EstadoParadaSalidaBus value) {
        return new JAXBElement<EstadoParadaSalidaBus>(_Salidadeautobuses_QNAME, EstadoParadaSalidaBus.class, null, value);
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link EstadoParadaBus }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://docs.gijon.es/sw/busgijon.asmx", name = "autobuses")
    public JAXBElement<EstadoParadaBus> createAutobuses(EstadoParadaBus value) {
        return new JAXBElement<EstadoParadaBus>(_Autobuses_QNAME, EstadoParadaBus.class, null, value);
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link InfoParadasBus }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://docs.gijon.es/sw/busgijon.asmx", name = "infoparadas")
    public JAXBElement<InfoParadasBus> createInfoparadas(InfoParadasBus value) {
        return new JAXBElement<InfoParadasBus>(_Infoparadas_QNAME, InfoParadasBus.class, null, value);
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link HorariosBus }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://docs.gijon.es/sw/busgijon.asmx", name = "horarios")
    public JAXBElement<HorariosBus> createHorarios(HorariosBus value) {
        return new JAXBElement<HorariosBus>(_Horarios_QNAME, HorariosBus.class, null, value);
    }

    /**
     * Create an instance of {@link JAXBElement }{@code <}{@link SalidasCabecerasBus }{@code >}}
     * 
     */
    @XmlElementDecl(namespace = "http://docs.gijon.es/sw/busgijon.asmx", name = "salidascabeberas")
    public JAXBElement<SalidasCabecerasBus> createSalidascabeberas(SalidasCabecerasBus value) {
        return new JAXBElement<SalidasCabecerasBus>(_Salidascabeberas_QNAME, SalidasCabecerasBus.class, null, value);
    }

}
