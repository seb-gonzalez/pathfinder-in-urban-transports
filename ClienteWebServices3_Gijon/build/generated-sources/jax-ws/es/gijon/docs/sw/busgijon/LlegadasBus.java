
package es.gijon.docs.sw.busgijon;

import java.util.ArrayList;
import java.util.List;
import javax.xml.bind.annotation.XmlAccessType;
import javax.xml.bind.annotation.XmlAccessorType;
import javax.xml.bind.annotation.XmlType;


/**
 * <p>Clase Java para LlegadasBus complex type.
 * 
 * <p>El siguiente fragmento de esquema especifica el contenido que se espera que haya en esta clase.
 * 
 * <pre>
 * &lt;complexType name="LlegadasBus">
 *   &lt;complexContent>
 *     &lt;restriction base="{http://www.w3.org/2001/XMLSchema}anyType">
 *       &lt;sequence>
 *         &lt;element name="llegada" type="{http://docs.gijon.es/sw/busgijon.asmx}LlegadaBus" maxOccurs="unbounded" minOccurs="0"/>
 *       &lt;/sequence>
 *     &lt;/restriction>
 *   &lt;/complexContent>
 * &lt;/complexType>
 * </pre>
 * 
 * 
 */
@XmlAccessorType(XmlAccessType.FIELD)
@XmlType(name = "LlegadasBus", propOrder = {
    "llegada"
})
public class LlegadasBus {

    protected List<LlegadaBus> llegada;

    /**
     * Gets the value of the llegada property.
     * 
     * <p>
     * This accessor method returns a reference to the live list,
     * not a snapshot. Therefore any modification you make to the
     * returned list will be present inside the JAXB object.
     * This is why there is not a <CODE>set</CODE> method for the llegada property.
     * 
     * <p>
     * For example, to add a new item, do as follows:
     * <pre>
     *    getLlegada().add(newItem);
     * </pre>
     * 
     * 
     * <p>
     * Objects of the following type(s) are allowed in the list
     * {@link LlegadaBus }
     * 
     * 
     */
    public List<LlegadaBus> getLlegada() {
        if (llegada == null) {
            llegada = new ArrayList<LlegadaBus>();
        }
        return this.llegada;
    }

}
