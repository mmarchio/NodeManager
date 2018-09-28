document.nodeManager = {
    "iterators": {
        "field": 0
    }
};
function getId(id) {
    return document.getElementById(id);
}

function insertElement(id, element) {
    getId(id).insertAdjacentHTML("beforeend", element);
}

function addListener(id, event, fn) {
    getId(id).addEventListener(event, fn);
}

function nodeElement() {
    var iterator = document.nodeManager.iterators.node;
    return "<li>" +
        "  <ul>" +
        "    <li id='node_fields_" + iterator + "'>" +
        "      <label for='node_name_" + iterator + "'>Node Name</label>" +
        "      <input type='text' name='node_name_" + iterator + "' id='node_name_" + iterator + "'>" +
        "    </li>" +
        "    <li>" +
        "      <label for='new_node_field_type_" + iterator + "'>Field Type</label>" +
        "      <select name='new_node_field_type_" + iterator + "' id='new_node_field_type_" + iterator + "'>" +
"                <option value=\"0\">Select Type</option>\n" +
        "        <option value=\"array\">Array</option>\n" +
        "        <option value=\"bigint\">Big Int</option>\n" +
        "        <option value=\"binary\">Binary</option>\n" +
        "        <option value=\"blob\">Blob</option>\n" +
        "        <option value=\"boolean\">Boolean</option>\n" +
        "        <option value=\"decimal\">Decimal</option>\n" +
        "        <option value=\"datetime\">Date Time</option>\n" +
        "        <option value=\"datetimetz\">Date Time TZ</option>\n" +
        "        <option value=\"date\">Date</option>\n" +
        "        <option value=\"float\">Float</option>\n" +
        "        <option value=\"guid\">Guid</option>\n" +
        "        <option value=\"integer\">Integer</option>\n" +
        "        <option value=\"jsonarray\">Json Array</option>\n" +
        "        <option value=\"object\">Object</option>\n" +
        "        <option value=\"simplearray\">Simple Array</option>\n" +
        "        <option value=\"smallint\">Small Int</option>\n" +
        "        <option value=\"string\">String</option>\n" +
        "        <option value=\"text\">Text</option>\n" +
        "        <option value=\"time\">Time</option>\n" +
        "      </select>" +
        "      <label for='new_node_field_" + iterator + "'>Add Field</label>" +
        "      <input type='button' name='new_node_field_" + iterator + "' id='new_node_field_" + iterator + "' value='Add Field'>" +
        "    </li>" +
        "  </ul>" +
        "</li>";
}

function fieldElement(type) {
    var iterator = document.nodeManager.iterators.field;
    var string = "<li>";
    type = type.substring(2, type.length - 2);
    string += "<ul>" +
        "  <input type='hidden' name='field_type_" + iterator + "' value='" + type + "'>" +
        "  <li>Type: " + type + "</li>" +
        "  <li>" +
        "    <label for='field_title_" + iterator + "'>Title</label>" +
        "    <input type='text' name='field_title_" + iterator + "' id='field_title_" + iterator + "'>" +
        "  </li>" +
        "  <li>" +
        "    <label for='field_nullable_" + iterator + "'>Nullable</label>" +
        "    <input type='checkbox' name='field_nullable_" + iterator + "' id='field_nullable_" + iterator + "' value='1'>" +
        "  </li>" +
        "  <li>" +
        "    <label for='field_unique_" + iterator + "'>Unique</label>" +
        "    <input type='checkbox' name='field_unique_" + iterator + "' id='field_unique_" + iterator + "' value='1'>" +
        "  </li>";
    switch (type) {
        case "string":
            string += "  <li>" +
                "    <label for='field_length_" + iterator + "'>Length</label>" +
                "    <input type='text' name='field_length_" + iterator + "' id='field_length_" + iterator + "'>" +
                "  </li>";
            break;
            break;
        case "decimal":
            string += "  <li>" +
                "    <label for='field_precision_" + iterator + "'>Precision</label>" +
                "    <input type='text' name='field_precision_" + iterator +"' id='field_precision_" + iterator + "'>" +
                "  </li>" +
                "  <li>" +
                "    <label for='field_scale_" + iterator + "'>Scale</label>" +
                "    <input type='text' name='field_scale_" + iterator + "' id='field_scale_" + iterator + "'>" +
                "  </li>";
            break;
        default:
            break;
    }
    string += "</ul>";
    string += "</li>";
    return string;
}

function fieldListener(iterator) {
    var type, field_type, fields_container;
    if (getId("new_node_field_type_" + iterator) !== undefined && getId("new_node_field_type_" + iterator) !== null) {
        type = getId("new_node_field_type_" + iterator).value;
        var field = fieldElement(type);
        insertElement("node_fields_" + iterator, field);
        document.nodeManager.iterators.field++;
    }
}

function addNode() {
    console.log("add_node clicked");
    var element = nodeElement();
    var iterator = document.nodeManager.iterators.node;
    var fn = fieldListener(iterator);
    insertElement("nodes", element);
    addListener("new_node_field_" + iterator, "click", fn);
    document.nodeManager.iterators.node++;
}

// addListener("add_node", "click", addNode());

document.getElementById("new_node_field").addEventListener("click", function(){
    var id = "new_node_field_type";
    var type = document.getElementById(id);
    if (type.selectedIndex !== 0) {
        document.getElementById("node_fields").insertAdjacentHTML("beforeend", fieldElement(type.value));
        document.nodeManager.iterators.field++;
        getId(id).selectedIndex = 0;
    }
});
