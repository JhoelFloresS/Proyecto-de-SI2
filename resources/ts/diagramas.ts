// import * as bpmn from 'gojs/projects/bpmn/BPMNScript.js'
// console.log('index.js');

import * as app from './BPMNScript'

document.addEventListener('DOMContentLoaded', () => {
    app.init();
        document.getElementById("newDocument").onclick = app.newDocument;
        document.getElementById("openDocuments").onclick = app.openDocument;
        document.getElementById("saveDocument").onclick = app.saveDocument;
        document.getElementById("saveDocumentAs").onclick = app.saveDocumentAs;
        document.getElementById("removeDocuments").onclick = app.removeDocument;

        document.getElementById("undo").onclick = app.undo;
        document.getElementById("redo").onclick = app.redo;
        document.getElementById("cutSelection").onclick = app.cutSelection;
        document.getElementById("copySelection").onclick = app.copySelection;
        document.getElementById("pasteSelection").onclick = app.pasteSelection;
        document.getElementById("deleteSelection").onclick = app.deleteSelection;
        document.getElementById("selectAll").onclick = app.selectAll;

        document.getElementById("alignLeft").onclick = app.alignLeft;
        document.getElementById("alignRight").onclick = app.alignRight;
        document.getElementById("alignTop").onclick = app.alignTop;
        document.getElementById("alignBottom").onclick = app.alignBottom;
        document.getElementById("alignCenterX").onclick = app.alignCenterX;
        document.getElementById("alignCenterY").onclick = app.alignCenterY;

        document.getElementById("alignRows").onclick = app.alignRows;
        document.getElementById("alignColumns").onclick = app.alignColumns;

        document.getElementById("grid").onclick = app.updateGridOption;
        document.getElementById("snap").onclick = app.updateSnapOption;

        // document.getElementById("basicOrderProcess").onclick = app.basicOrderProcess;
        // document.getElementById("5.1").onclick = app.BPMNdata51;
        // document.getElementById("5.2").onclick = app.BPMNdata52;
        // document.getElementById("5.3").onclick = app.BPMNdata53;

        document.getElementById("openBtn").onclick = app.loadFile;
        document.getElementById("cancelBtn").onclick = app.cancel1;

        document.getElementById("removeBtn").onclick = app.removeFile;
        document.getElementById("cancelBtn2").onclick = app.cancel2;
});