
package es.gijon.docs.sw.busgijon;

import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlElement;
import javax.xml.bind.annotation.XmlSchemaType;
import javax.xml.bind.annotation.XmlType;
import javax.xml.datatype.XMLGregorianCalendar;


/**
 * <p>Clase Java para ParadaAutobusTrayectoBus complex type.
 * 
 * <p>El siguiente fragmento de esquema especifica el contenido que se espera que haya en esta clase.
 * 
 * <pre>
 * &lt;complexType name="ParadaAutobusTrayectoBus">
 *   &lt;complexContent>
 *     &lt;restriction base="{http://www.w3.org/2001/XMLSchema}anyType">
 *       &lt;sequence>
 *         &lt;element name="idparada" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="minutos" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="distancia" type="{http://www.w3.org/2001/XMLSchema}double"/>
 *         &lt;element name="horaactualizacion" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="fechaactualizacion" type="{http://www.w3.org/2001/XMLSchema}dateTime"/>
 *       &lt;/sequence>
 *     &lt;/restriction>
 *   &lt;/complexContent>
 * &lt;/complexType>
 * </pre>
 * 
 * 
 */
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "ParadaAutobusTrayectoBus", propOrder = {
    "idparada",
    "minutos",
    "distancia",
    "horaactualizacion",
    "fechaactualizacion"
})
public class ParadaAutobusTrayectoBus {

    protected int idparada;
    protected int minutos;
    protected double distancia;
    protected String horaactualizacion;
    @XmlElement(required = true)
    @XmlSchemaType(name = "dateTime")
    protected XMLGregorianCalendar fechaactualizacion;

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

}
