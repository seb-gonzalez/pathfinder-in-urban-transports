
package es.gijon.docs.sw.busgijon;

import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlRootElement;
import javax.xml.bind.annotation.XmlType;


/**
 * <p>Clase Java para anonymous complex type.
 * 
 * <p>El siguiente fragmento de esquema especifica el contenido que se espera que haya en esta clase.
 * 
 * <pre>
 * &lt;complexType>
 *   &lt;complexContent>
 *     &lt;restriction base="{http://www.w3.org/2001/XMLSchema}anyType">
 *       &lt;sequence>
 *         &lt;element name="piIdLinea" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *       &lt;/sequence>
 *     &lt;/restriction>
 *   &lt;/complexContent>
 * &lt;/complexType>
 * </pre>
 * 
 * 
 */
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "", propOrder = {
    "piIdLinea"
})
@XmlRootElement(name = "estadoLinea")
public class EstadoLinea {

    protected int piIdLinea;

    /**
     * Obtiene el valor de la propiedad piIdLinea.
     * 
     */
    public int getPiIdLinea() {
        return piIdLinea;
    }

    /**
     * Define el valor de la propiedad piIdLinea.
     * 
     */
    public void setPiIdLinea(int value) {
        this.piIdLinea = value;
    }

}
