@section('navbar', 'Procesos de negocios')
@section('aside-diagramas', 'py-2.7 bg-blue-500/13')
@section('head')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
        integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/require.js/2.3.6/require.min.js"></script>
    <script>
        var tenant = '{{ tenant('id') }}';
    </script>
    @vite(['resources/ts/diagramas.ts', 'resources/js/diagramas.js', 'resources/css/diagramas.css'])

@endsection


<x-tenant-app title="documento">
 
    <div x-data="diagrama">
        <div>
            <div x-model="title" id="currentFile">(Archivo sin Guardar)</div>
            <ul id="menuui">
                <li><a href="#">Archivo</a>
                    <ul>
                        <li><a href="#" id="newDocument">Nuevo </a></li>
                        <li><a href="#" id="openDocuments">Abrir </a></li>
                        <li><a href="#" id="saveDocument">Guardar</a></li>
                        <li><a href="#" id="saveDocumentAs">Guardar Como...</a></li>
                        <li><a href="#" id="removeDocuments">Eliminar...</a></li>
                    </ul>
                </li>
                <li><a href="#">Editar</a>
                    <ul>
                        <li><a href="#" id="undo">Undo</a></li>
                        <li><a href="#" id="redo">Redo</a></li>
                        <li><a href="#" id="cutSelection">Cut</a></li>
                        <li><a href="#" id="copySelection">Copy</a></li>
                        <li><a href="#" id="pasteSelection">Paste</a></li>
                        <li><a href="#" id="deleteSelection">Delete</a></li>
                        <li><a href="#" id="selectAll">Select All</a></li>
                    </ul>
                </li>
                <li><a href="#">Alineación</a>
                    <ul>
                        <li><a href="#" id="alignLeft">Left Sides</a></li>
                        <li><a href="#" id="alignRight">Right Sides</a></li>
                        <li><a href="#" id="alignTop">Tops</a></li>
                        <li><a href="#" id="alignBottom">Bottoms</a></li>
                        <li><a href="#" id="alignCenterX">Center X</a></li>
                        <li><a href="#" id="alignCenterY">Center Y</a></li>
                    </ul>
                </li>
                <li><a href="#">Espaciado</a>
                    <ul>
                        <li><a href="#" id="alignRows">In Row...</a></li>
                        <li><a href="#" id="alignColumns">In Column...</a></li>
                    </ul>
                </li>
                <li><a href="#">Opciones</a>
                    <ul>
                        <li><a href="#">
                                <input id="grid" type="checkbox" name="options" value="grid">Grid</a></li>
                        <li><a href="#">
                                <input id="snap" type="checkbox" name="options" value="0">Snapping</a></li>
                    </ul>
                </li>
            </ul>
        </div>
        <!--END menu bar -->

        <!-- Styling for this portion is in BPMN.css -->
        <div id="PaletteAndDiagram">
            <div id="sideBar">
                <span style="display: inline-block; vertical-align: top; padding: 5px; width:100%">
                    <div id="accordion">
                        <h4>Elementos nivel 1</h4>
                        <div>
                            <div id="myPaletteLevel1" class="myPaletteDiv"></div>
                        </div>
                        <h4>Elementos nivel 2</h4>
                        <div>
                            <div id="myPaletteLevel2" class="myPaletteDiv"></div>
                        </div>
                        <h4>Otros elementos</h4>
                        <div>
                            <div id="myPaletteLevel3" class="myPaletteDiv"></div>
                        </div>
                    </div>
                </span>
                <div class="handle">Overview:</div>
                <div id="myOverviewDiv"></div>
            </div>
            <div id="myDiagramDiv"></div>

        </div>

        <div id="openDocument" class="draggable">
            <div id="openDraggableHandle" class="handle">Abrir Diagrama</div>
            <div id="openText" class="elementText">Eliga el diagrama a abrir...</div>
            <select id="mySavedFiles" class="mySavedFiles"></select>
            <br />
            <button id="openBtn" class="elementBtn" type="button"style="margin-left: 70px">Abrir</button>
            <button id="cancelBtn" class="elementBtn" type="button">Cancelar</button>
        </div>

        <div id="removeDocument" class="draggable">
            <div id="removeDraggableHandle" class="handle">Eliminar diagrama</div>
            <div id="removeText" class="elementText">Eliga el diagrama a eliminar...</div>
            <select id="mySavedFiles2" class="mySavedFiles"></select>
            <br />
            <button id="removeBtn" class="elementBtn" type="button" style="margin-left: 70px">Eliminar</button>
            <button id="cancelBtn2" class="elementBtn" type="button">Cancel</button>
        </div>
    </div>
</x-tenant-app>
