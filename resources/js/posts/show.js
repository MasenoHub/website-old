import Quill from "quill";

const quill = new Quill("#body", { readOnly: true });
quill.setContents(JSON.parse(body));