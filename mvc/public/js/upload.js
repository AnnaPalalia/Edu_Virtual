/**
 * Created by buap on 19/01/17.
 */
$(function () {
    $('#docs').filer({
        changeInput: '<div class="jFiler-input-dragDrop"><div class="jFiler-input-inner"><div class="jFiler-input-icon"><i class="fa fa-cloud-upload"></i></div><div class="jFiler-input-text"><h3>Arrastra y Suelta tu archivo aquí</h3> <span style="display:inline-block; margin: 15px 0">Ó</span></div><a class="jFiler-input-choose-btn blue">Explora tus archivos</a></div></div>',
        showThumbs: true,
        addMore: true,
        maxSize: 20,
        theme: "dragdropbox",
        templates: {
            box: '<ul class="jFiler-items-list jFiler-items-grid"></ul>',
            item: '<li class="jFiler-item">\
                    <div class="jFiler-item-container">\
                        <div class="jFiler-item-inner">\
                            <div class="jFiler-item-thumb">\
                                <div class="jFiler-item-status"></div>\
                                <div class="jFiler-item-info">\
                                    <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                    <span class="jFiler-item-others">{{fi-size2}}</span>\
                                </div>\
                                {{fi-image}}\
                            </div>\
                            <div class="jFiler-item-assets jFiler-row">\
                                <ul class="list-inline pull-left">\
                                    <li>{{fi-progressBar}}</li>\
                                </ul>\
                                <ul class="list-inline pull-right">\
                                    <li><a class="fa fa-trash jFiler-item-trash-action"></a></li>\
                                </ul>\
                            </div>\
                        </div>\
                    </div>\
                </li>',
            itemAppend: '<li class="jFiler-item">\
                        <div class="jFiler-item-container">\
                            <div class="jFiler-item-inner">\
                                <div class="jFiler-item-thumb">\
                                    <div class="jFiler-item-status"></div>\
                                    <div class="jFiler-item-info">\
                                        <span class="jFiler-item-title"><b title="{{fi-name}}">{{fi-name | limitTo: 25}}</b></span>\
                                        <span class="jFiler-item-others">{{fi-size2}}</span>\
                                    </div>\
                                    {{fi-image}}\
                                </div>\
                                <div class="jFiler-item-assets jFiler-row">\
                                    <ul class="list-inline pull-left">\
                                        <li><span class="jFiler-item-others">{{fi-icon}}</span></li>\
                                    </ul>\
                                    <ul class="list-inline pull-right">\
                                        <li><a class="fa fa-trash jFiler-item-trash-action"></a></li>\
                                    </ul>\
                                </div>\
                            </div>\
                        </div>\
                    </li>',
            progressBar: '<div class="bar"></div>',
            itemAppendToEnd: false,
            removeConfirmation: true,
            _selectors: {
                list: '.jFiler-items-list',
                item: '.jFiler-item',
                progressBar: '.bar',
                remove: '.jFiler-item-trash-action'
            }
        },
        dragDrop: {
            dragEnter: null,
            dragLeave: null,
            drop: null
        },
        captions: {
            removeConfirmation: "¿Está seguro de que desea eliminar este archivo?",
            errors: {
                filesLimit: "Sólo {{fi-limit}} archivo(s) pueden ser cargados.",
                filesType: "Solo se pueden cargar archivos PDF.",
                filesSize: "{{fi-name}} ¡Es demasiado pesado! Por favor, cargar el archivo de hasta {{fi-fileMaxSize}} MB.",
                filesSizeAll: "Los archivos que ha elegido son demasiado grandes! Por favor, subir archivos de hasta {{fi-maxSize}} MB."
            }
        }

    });

    $('#files').submit(function () {
        var filerKit = $('#docs').prop('jFiler');
        var files_list = filerKit.files_list;

        $('#docs').remove();
        var form = document.forms.namedItem('files');
        var data = new FormData(form);

        for (var i=0;i <files_list.length;i++){
            data.append('files[]',files_list[i].file);
        }
        $.ajax({
           type: 'POST',
            url: 'uploadFiles.php',
            processData:false,
            contentType:false,
            data: data,
            success: function (response) {
                console.log(response);
            }

        });

        return false;

    })

});