
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
 *         &lt;element name="piIdParada" type="{http://www.w3.org/2001/XMLSchema}int"/>
 *         &lt;element name="psFechaHora" type="{http://www.w3.org/2001/XMLSchema}string" minOccurs="0"/>
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
    "piIdParada",
    "psFechaHora"
})
@XmlRootElement(name = "estadoCabeceraSalidas")
public class EstadoCabeceraSalidas {

    protected int piIdParada;
    protected String psFechaHora;

    /**
     * Obtiene el valor de la propiedad piIdParada.
     * 
     */
    public int getPiIdParada() {
        return piIdParada;
    }

    /**
     * Define el valor de la propiedad piIdParada.
     * 
     */
    public void setPiIdParada(int value) {
        this.piIdParada = value;
    }

    /**
     * Obtiene el valor de la propiedad psFechaHora.
     * 
     * @return
     *     possible object is
     *     {@link String }
     *     
     */
    public String getPsFechaHora() {
        return psFechaHora;
    }

    /**
     * Define el valor de la propiedad psFechaHora.
     * 
     * @param value
     *     allowed object is
     *     {@link String }
     *     
     */
    public void setPsFechaHora(String value) {
        this.psFechaHora = value;
    }

}
