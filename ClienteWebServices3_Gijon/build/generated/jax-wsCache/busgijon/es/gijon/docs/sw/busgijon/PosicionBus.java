
package es.gijon.docs.sw.busgijon;

import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlElement;
import javax.xml.bind.annotation.XmlSchemaType;
import javax.xml.bind.annotation.XmlType;
import javax.xml.datatype.XMLGregorianCalendar;


/**
 * <p>Clase Java para PosicionBus complex type.
 * 
 * <p>El siguiente fragmento de esquema especifica el contenido que se espera que haya en esta clase.
 * 
 * <pre>
 * &lt;complexType name="PosicionBus">
 *   &lt;complexContent>
 *     &lt;restriction base="{http://www.w3.org/2001/XMLSchema}anyType">
 *       &lt;sequence>
 *         &lt;element name="idautobus" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="matricula" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="modelo" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="idlinea" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="idtrayecto" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="idparada" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="ordenparada" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="utmx" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="utmy" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="horaactualizacion" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="fechaactualizacion" type="{http://www.w3.org/2001/XMLSchema}dateTime"/>
 *         &lt;element name="idsiguienteparada" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="minutos" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="distancia" type="{http://www.w3.org/2001/XMLSchema}double"/>
 *       &lt;/sequence>
 *     &lt;/restriction>
 *   &lt;/complexContent>
 * &lt;/complexType>
 * </pre>
 * 
 * 
 */
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "PosicionBus", propOrder = {
    "idautobus",
    "matricula",
    "modelo",
    "idlinea",
    "idtrayecto",
    "idparada",
    "ordenparada",
    "utmx",
    "utmy",
    "horaactualizacion",
    "fechaactualizacion",
    "idsiguienteparada",
    "minutos",
    "distancia"
})
public class PosicionBus {

    protected String idautobus;
    protected String matricula;
    protected String modelo;
    protected int idlinea;
    protected int idtrayecto;
    protected int idparada;
    protected int ordenparada;
    protected int utmx;
    protected int utmy;
    protected String horaactualizacion;
    @XmlElement(required = true)
    @XmlSchemaType(name = "dateTime")
    protected XMLGregorianCalendar fechaactualizacion;
    protected int idsiguienteparada;
    protected int minutos;
    protected double distancia;

    /**
     * Obtiene el valor de la propiedad idautobus.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getIdautobus() {
        return idautobus;
    }

    /**
     * Define el valor de la propiedad idautobus.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setIdautobus(String value) {
        this.idautobus = value;
    }

    /**
     * Obtiene el valor de la propiedad matricula.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getMatricula() {
        return matricula;
    }

    /**
     * Define el valor de la propiedad matricula.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setMatricula(String value) {
        this.matricula = value;
    }

    /**
     * Obtiene el valor de la propiedad modelo.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getModelo() {
        return modelo;
    }

    /**
     * Define el valor de la propiedad modelo.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setModelo(String value) {
        this.modelo = value;
    }

    /**
     * Obtiene el valor de la propiedad idlinea.
     * 
     */
    public int getIdlinea() {
        return idlinea;
    }

    /**
     * Define el valor de la propiedad idlinea.
     * 
     */
    public void setIdlinea(int value) {
        this.idlinea = value;
    }

    /**
     * Obtiene el valor de la propiedad idtrayecto.
     * 
     */
    public int getIdtrayecto() {
        return idtrayecto;
    }

    /**
     * Define el valor de la propiedad idtrayecto.
     * 
     */
    public void setIdtrayecto(int value) {
        this.idtrayecto = value;
    }

    /**
     * Obtiene el valor de la propiedad idparada.
     * 
     */
    public int getIdparada() {
        return idparada;
    }

    /**
     * Define el valor de la propiedad idparada.
     * 
     */
    public void setIdparada(int value) {
        this.idparada = value;
    }

    /**
     * Obtiene el valor de la propiedad ordenparada.
     * 
     */
    public int getOrdenparada() {
        return ordenparada;
    }

    /**
     * Define el valor de la propiedad ordenparada.
     * 
     */
    public void setOrdenparada(int value) {
        this.ordenparada = value;
    }

    /**
     * Obtiene el valor de la propiedad utmx.
     * 
     */
    public int getUtmx() {
        return utmx;
    }

    /**
     * Define el valor de la propiedad utmx.
     * 
     */
    public void setUtmx(int value) {
        this.utmx = value;
    }

    /**
     * Obtiene el valor de la propiedad utmy.
     * 
     */
    public int getUtmy() {
        return utmy;
    }

    /**
     * Define el valor de la propiedad utmy.
     * 
     */
    public void setUtmy(int value) {
        this.utmy = value;
    }

    /**
     * Obtiene el valor de la propiedad horaactualizacion.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getHoraactualizacion() {
        return horaactualizacion;
    }

    /**
     * Define el valor de la propiedad horaactualizacion.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setHoraactualizacion(String value) {
        this.horaactualizacion = value;
    }

    /**
     * Obtiene el valor de la propiedad fechaactualizacion.
     * 
     * @return
     *     possible object is
     *     {@link XMLGregorianCalendar }
     *     
     */
    public XMLGregorianCalendar getFechaactualizacion() {
        return fechaactualizacion;
    }

    /**
     * Define el valor de la propiedad fechaactualizacion.
     * 
     * @param value
     *     allowed object is
     *     {@link XMLGregorianCalendar }
     *     
     */
    public void setFechaactualizacion(XMLGregorianCalendar value) {
        this.fechaactualizacion = value;
    }

    /**
     * Obtiene el valor de la propiedad idsiguienteparada.
     * 
     */
    public int getIdsiguienteparada() {
        return idsiguienteparada;
    }

    /**
     * Define el valor de la propiedad idsiguienteparada.
     * 
     */
    public void setIdsiguienteparada(int value) {
        this.idsiguienteparada = value;
    }

    /**
     * Obtiene el valor de la propiedad minutos.
     * 
     */
    public int getMinutos() {
        return minutos;
    }

    /**
     * Define el valor de la propiedad minutos.
     * 
     */
    public void setMinutos(int value) {
        this.minutos = value;
    }

    /**
     * Obtiene el valor de la propiedad distancia.
     * 
     */
    public double getDistancia() {
        return distancia;
    }

    /**
     * Define el valor de la propiedad distancia.
     * 
     */
    public void setDistancia(double value) {
        this.distancia = value;
    }

}
