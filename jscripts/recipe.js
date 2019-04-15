var selectionCounter = 0
var quantity = 0

function cloneSelect() {
    var select = document.getElementById("statement")
    var clone = select.cloneNode(true)
    var name = select.getAttribute("name") + selectionCounter++
        clone.id = name
    clone.setAttribute("name", name)
    document.getElementById("selectContainer").appendChild(clone)


    var span = document.getElementById("quantity")
    var clone = span.cloneNode(true)
    var qty = span.getAttribute("name") + quantity++
        clone.id = qty
    clone.setAttribute("name", qty)
    document.getElementById("selectContainer").appendChild(clone)

}