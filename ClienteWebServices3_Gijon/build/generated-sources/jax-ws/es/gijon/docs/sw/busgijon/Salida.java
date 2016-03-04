
package es.gijon.docs.sw.busgijon;

import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlElement;
import javax.xml.bind.annotation.XmlSchemaType;
import javax.xml.bind.annotation.XmlType;
import javax.xml.datatype.XMLGregorianCalendar;


/**
 * <p>Clase Java para Salida complex type.
 * 
 * <p>El siguiente fragmento de esquema especifica el contenido que se espera que haya en esta clase.
 * 
 * <pre>
 * &lt;complexType name="Salida">
 *   &lt;complexContent>
 *     &lt;restriction base="{http://www.w3.org/2001/XMLSchema}anyType">
 *       &lt;sequence>
 *         &lt;element name="dtfechainicio" type="{http://www.w3.org/2001/XMLSchema}dateTime"/>
 *         &lt;element name="dtfechafin" type="{http://www.w3.org/2001/XMLSchema}dateTime"/>
 *         &lt;element name="iidlinea" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="iidtrayecto" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="iordenenuhs" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="dthorainicio" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="inumeroexpedicion" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="iordenentrayecto" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="iidparada" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="parada" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *       &lt;/sequence>
 *     &lt;/restriction>
 *   &lt;/complexContent>
 * &lt;/complexType>
 * </pre>
 * 
 * 
 */
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "Salida", propOrder = {
    "dtfechainicio",
    "dtfechafin",
    "iidlinea",
    "iidtrayecto",
    "iordenenuhs",
    "dthorainicio",
    "inumeroexpedicion",
    "iordenentrayecto",
    "iidparada",
    "parada"
})
public class Salida {

    @XmlElement(required = true)
    @XmlSchemaType(name = "dateTime")
    protected XMLGregorianCalendar dtfechainicio;
    @XmlElement(required = true)
    @XmlSchemaType(name = "dateTime")
    protected XMLGregorianCalendar dtfechafin;
    protected int iidlinea;
    protected int iidtrayecto;
    protected int iordenenuhs;
    protected String dthorainicio;
    protected int inumeroexpedicion;
    protected int iordenentrayecto;
    protected int iidparada;
    protected String parada;

    /**
     * Obtiene el valor de la propiedad dtfechainicio.
     * 
     * @return
     *     possible object is
     *     {@link XMLGregorianCalendar }
     *     
     */
    public XMLGregorianCalendar getDtfechainicio() {
        return dtfechainicio;
    }

    /**
     * Define el valor de la propiedad dtfechainicio.
     * 
     * @param value
     *     allowed object is
     *     {@link XMLGregorianCalendar }
     *     
     */
    public void setDtfechainicio(XMLGregorianCalendar value) {
        this.dtfechainicio = value;
    }

    /**
     * Obtiene el valor de la propiedad dtfechafin.
     * 
     * @return
     *     possible object is
     *     {@link XMLGregorianCalendar }
     *     
     */
    public XMLGregorianCalendar getDtfechafin() {
        return dtfechafin;
    }

    /**
     * Define el valor de la propiedad dtfechafin.
     * 
     * @param value
     *     allowed object is
     *     {@link XMLGregorianCalendar }
     *     
     */
    public void setDtfechafin(XMLGregorianCalendar value) {
        this.dtfechafin = value;
    }

    /**
     * Obtiene el valor de la propiedad iidlinea.
     * 
     */
    public int getIidlinea() {
        return iidlinea;
    }

    /**
     * Define el valor de la propiedad iidlinea.
     * 
     */
    public void setIidlinea(int value) {
        this.iidlinea = value;
    }

    /**
     * Obtiene el valor de la propiedad iidtrayecto.
     * 
     */
    public int getIidtrayecto() {
        return iidtrayecto;
    }

    /**
     * Define el valor de la propiedad iidtrayecto.
     * 
     */
    public void setIidtrayecto(int value) {
        this.iidtrayecto = value;
    }

    /**
     * Obtiene el valor de la propiedad iordenenuhs.
     * 
     */
    public int getIordenenuhs() {
        return iordenenuhs;
    }

    /**
     * Define el valor de la propiedad iordenenuhs.
     * 
     */
    public void setIordenenuhs(int value) {
        this.iordenenuhs = value;
    }

    /**
     * Obtiene el valor de la propiedad dthorainicio.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getDthorainicio() {
        return dthorainicio;
    }

    /**
     * Define el valor de la propiedad dthorainicio.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setDthorainicio(String value) {
        this.dthorainicio = value;
    }

    /**
     * Obtiene el valor de la propiedad inumeroexpedicion.
     * 
     */
    public int getInumeroexpedicion() {
        return inumeroexpedicion;
    }

    /**
     * Define el valor de la propiedad inumeroexpedicion.
     * 
     */
    public void setInumeroexpedicion(int value) {
        this.inumeroexpedicion = value;
    }

    /**
     * Obtiene el valor de la propiedad iordenentrayecto.
     * 
     */
    public int getIordenentrayecto() {
        return iordenentrayecto;
    }

    /**
     * Define el valor de la propiedad iordenentrayecto.
     * 
     */
    public void setIordenentrayecto(int value) {
        this.iordenentrayecto = value;
    }

    /**
     * Obtiene el valor de la propiedad iidparada.
     * 
     */
    public int getIidparada() {
        return iidparada;
    }

    /**
     * Define el valor de la propiedad iidparada.
     * 
     */
    public void setIidparada(int value) {
        this.iidparada = value;
    }

    /**
     * Obtiene el valor de la propiedad parada.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getParada() {
        return parada;
    }

    /**
     * Define el valor de la propiedad parada.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setParada(String value) {
        this.parada = value;
    }

}
