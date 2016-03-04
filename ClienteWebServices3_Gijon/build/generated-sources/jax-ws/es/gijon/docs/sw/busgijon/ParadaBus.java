
package es.gijon.docs.sw.busgijon;

import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlType;


/**
 * <p>Clase Java para ParadaBus complex type.
 * 
 * <p>El siguiente fragmento de esquema especifica el contenido que se espera que haya en esta clase.
 * 
 * <pre>
 * &lt;complexType name="ParadaBus">
 *   &lt;complexContent>
 *     &lt;restriction base="{http://www.w3.org/2001/XMLSchema}anyType">
 *       &lt;sequence>
 *         &lt;element name="idparada" type="{http://www.w3.org/2001/XMLSchema}int"/>
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
@XmlType(name = "ParadaBus", propOrder = {
    "idparada",
    "descripcion",
    "utmx",
    "utmy"
})
public class ParadaBus {

    protected int idparada;
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
