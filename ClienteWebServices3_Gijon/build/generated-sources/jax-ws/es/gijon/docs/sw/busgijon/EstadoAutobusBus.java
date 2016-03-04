
package es.gijon.docs.sw.busgijon;

import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlElement;
import javax.xml.bind.annotation.XmlSchemaType;
import javax.xml.bind.annotation.XmlType;
import javax.xml.datatype.XMLGregorianCalendar;


/**
 * <p>Clase Java para EstadoAutobusBus complex type.
 * 
 * <p>El siguiente fragmento de esquema especifica el contenido que se espera que haya en esta clase.
 * 
 * <pre>
 * &lt;complexType name="EstadoAutobusBus">
 *   &lt;complexContent>
 *     &lt;restriction base="{http://www.w3.org/2001/XMLSchema}anyType">
 *       &lt;sequence>
 *         &lt;element name="idautobus" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="utmx" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="utmy" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="horaactualizacion" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="fechaactualizacion" type="{http://www.w3.org/2001/XMLSchema}dateTime"/>
 *         &lt;element name="paradas" type="{http://docs.gijon.es/sw/busgijon.asmx}ArrayOfEstadoParadasBus" minOccurs="0"/>
 *       &lt;/sequence>
 *     &lt;/restriction>
 *   &lt;/complexContent>
 * &lt;/complexType>
 * </pre>
 * 
 * 
 */
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "EstadoAutobusBus", propOrder = {
    "idautobus",
    "utmx",
    "utmy",
    "horaactualizacion",
    "fechaactualizacion",
    "paradas"
})
public class EstadoAutobusBus {

    protected String idautobus;
    protected int utmx;
    protected int utmy;
    protected String horaactualizacion;
    @XmlElement(required = true)
    @XmlSchemaType(name = "dateTime")
    protected XMLGregorianCalendar fechaactualizacion;
    protected ArrayOfEstadoParadasBus paradas;

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
     * Obtiene el valor de la propiedad paradas.
     * 
     * @return
     *     possible object is
     *     {@link ArrayOfEstadoParadasBus }
     *     
     */
    public ArrayOfEstadoParadasBus getParadas() {
        return paradas;
    }

    /**
     * Define el valor de la propiedad paradas.
     * 
     * @param value
     *     allowed object is
     *     {@link ArrayOfEstadoParadasBus }
     *     
     */
    public void setParadas(ArrayOfEstadoParadasBus value) {
        this.paradas = value;
    }

}
