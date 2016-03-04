
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
 *         &lt;element name="posiciones" type="{http://docs.gijon.es/sw/busgijon.asmx}PosicionesBus" minOccurs="0"/>
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
    "posiciones"
})
@XmlRootElement(name = "PosicionesResponse")
public class PosicionesResponse {

    protected PosicionesBus posiciones;

    /**
     * Obtiene el valor de la propiedad posiciones.
     * 
     * @return
     *     possible object is
     *     {@link PosicionesBus }
     *     
     */
    public PosicionesBus getPosiciones() {
        return posiciones;
    }

    /**
     * Define el valor de la propiedad posiciones.
     * 
     * @param value
     *     allowed object is
     *     {@link PosicionesBus }
     *     
     */
    public void setPosiciones(PosicionesBus value) {
        this.posiciones = value;
    }

}
