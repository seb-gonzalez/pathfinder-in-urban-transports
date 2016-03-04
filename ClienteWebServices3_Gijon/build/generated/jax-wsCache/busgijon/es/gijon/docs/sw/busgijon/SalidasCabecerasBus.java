
package es.gijon.docs.sw.busgijon;

import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlType;


/**
 * <p>Clase Java para SalidasCabecerasBus complex type.
 * 
 * <p>El siguiente fragmento de esquema especifica el contenido que se espera que haya en esta clase.
 * 
 * <pre>
 * &lt;complexType name="SalidasCabecerasBus">
 *   &lt;complexContent>
 *     &lt;restriction base="{http://www.w3.org/2001/XMLSchema}anyType">
 *       &lt;sequence>
 *         &lt;element name="salidas" type="{http://docs.gijon.es/sw/busgijon.asmx}ArrayOfSalida" minOccurs="0"/>
 *       &lt;/sequence>
 *     &lt;/restriction>
 *   &lt;/complexContent>
 * &lt;/complexType>
 * </pre>
 * 
 * 
 */
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "SalidasCabecerasBus", propOrder = {
    "salidas"
})
public class SalidasCabecerasBus {

    protected ArrayOfSalida salidas;

    /**
     * Obtiene el valor de la propiedad salidas.
     * 
     * @return
     *     possible object is
     *     {@link ArrayOfSalida }
     *     
     */
    public ArrayOfSalida getSalidas() {
        return salidas;
    }

    /**
     * Define el valor de la propiedad salidas.
     * 
     * @param value
     *     allowed object is
     *     {@link ArrayOfSalida }
     *     
     */
    public void setSalidas(ArrayOfSalida value) {
        this.salidas = value;
    }

}
