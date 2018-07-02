import Converter from 'quill-delta-to-html'
import Modal from 'Mixins/Modal'

if document.querySelector '.ticket-editor'
    editor = new Quill '.ticket-editor',
        theme: 'snow',
        modules:
            toolbar: [
                ['bold'],
                ['image']
            ]
        placeholder: "Напишите свой вопрос..."

    customImageHandler = ->
        input = document.createElement 'input'
        input.setAttribute 'type', 'file'
        input.setAttribute 'accept', 'image/*'
        input.click()

        input.onchange = () =>
            file = input.files[0]
            if /^image\//.test file.type
                saveToServer file
            else
                console.warn "Вы можете загружать только картинки"

        saveToServer = (file) =>
            fd = new FormData()
            fd.append 'image', file

            axios.post imageUploadURL, fd,
                headers:
                    'Content-Type': 'multipart/form-data'

            .then (response) =>
                insertToEditor response.data
            .catch (err) =>
                console.log err

        insertToEditor = (url) =>
            range = editor.getSelection()
            editor.insertEmbed range.index, 'image', websiteURL + "/" + url

    editor.getModule('toolbar').addHandler 'image', () => customImageHandler()

    new Vue
        el: '#ticket'
        data:
            data: null

        mounted: ->
            editor.on 'text-change', =>
                @data = new Converter(editor.getContents().ops).convert()

    new Vue
        el: '#status'

new Vue
    el: '#modal'
    mixins: [Modal]
