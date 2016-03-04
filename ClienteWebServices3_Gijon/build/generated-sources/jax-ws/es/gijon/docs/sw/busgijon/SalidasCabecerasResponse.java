
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
 *         &lt;element name="salidascabeberas" type="{http://docs.gijon.es/sw/busgijon.asmx}SalidasCabecerasBus" minOccurs="0"/>
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
    "salidascabeberas"
})
@XmlRootElement(name = "salidasCabecerasResponse")
public class SalidasCabecerasResponse {

    protected SalidasCabecerasBus salidascabeberas;

    /**
     * Obtiene el valor de la propiedad salidascabeberas.
     * 
     * @return
     *     possible object is
     *     {@link SalidasCabecerasBus }
     *     
     */
    public SalidasCabecerasBus getSalidascabeberas() {
        return salidascabeberas;
    }

    /**
     * Define el valor de la propiedad salidascabeberas.
     * 
     * @param value
     *     allowed object is
     *     {@link SalidasCabecerasBus }
     *     
     */
    public void setSalidascabeberas(SalidasCabecerasBus value) {
        this.salidascabeberas = value;
    }

}
