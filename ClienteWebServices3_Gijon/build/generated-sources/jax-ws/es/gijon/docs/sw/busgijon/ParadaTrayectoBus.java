
package es.gijon.docs.sw.busgijon;

import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlType;


/**
 * <p>Clase Java para ParadaTrayectoBus complex type.
 * 
 * <p>El siguiente fragmento de esquema especifica el contenido que se espera que haya en esta clase.
 * 
 * <pre>
 * &lt;complexType name="ParadaTrayectoBus">
 *   &lt;complexContent>
 *     &lt;restriction base="{http://www.w3.org/2001/XMLSchema}anyType">
 *       &lt;sequence>
 *         &lt;element name="idparada" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="idlinea" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="idtrayecto" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="orden" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="descripcion" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
 *         &lt;element name="utmx" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="utmy" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *       &lt;/sequence>
 *     &lt;/restriction>
 *   &lt;/complexContent>
 * &lt;/complexType>
 * </pre>
 * 
 * 
 */
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "ParadaTrayectoBus", propOrder = {
    "idparada",
    "idlinea",
    "idtrayecto",
    "orden",
    "descripcion",
    "utmx",
    "utmy"
})
public class ParadaTrayectoBus {

    protected int idparada;
    protected int idlinea;
    protected int idtrayecto;
    protected int orden;
    protected String descripcion;
    protected int utmx;
    protected int utmy;

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
     * Obtiene el valor de la propiedad orden.
     * 
     */
    public int getOrden() {
        return orden;
    }

    /**
     * Define el valor de la propiedad orden.
     * 
     */
    public void setOrden(int value) {
        this.orden = value;
    }

    /**
     * Obtiene el valor de la propiedad descripcion.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getDescripcion() {
        return descripcion;
    }

    /**
     * Define el valor de la propiedad descripcion.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setDescripcion(String value) {
        this.descripcion = value;
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

}
