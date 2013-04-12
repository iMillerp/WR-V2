$(document).ready(function() {
    $("#mws-jui-dialog").hide();
    $("div#mws-login .mws-login-back").mouseover(function(event) {
        $(this).find("a").animate({
            'left':0
        })
    }).mouseout(function(event) {
        $(this).find("a").animate({
            'left':70
        })
    });
});

function reloadPedidos(){
    setTimeout("load_wr('?paginas=h_pedidos&local=paginas/home', 'pedidos', 'GET')",2000);
}

function closeDialog(){
    setTimeout(function(){
        $("#vizualizarpedido").dialog('close')
    }, 3000);
}

function cadastroUsers(){
    setTimeout(function(){
        if($.fn.filestyle) {
            $("input[type='file']").filestyle({
                imagewidth: 78,
                imageHeight: 28
            });
            $("input.file").attr("readonly", true);
        }
    },1800);
}

function verPedido(idpedido){
    var idpedido = idpedido;
    if( $.fn.dialog ) {
        $("#vizualizarpedido").dialog({
            autoOpen: true,
            title: "Vizualizar Pedido Nº "+idpedido,
            modal: true,
            width: "500",
            position: {
                my: "center",
                at: "center"
            },
            buttons: [{
                text: "Fechar",
                click: function() {
                    $(this).dialog("close");
                }
            },
            {
                text: "Marcar Como Atendido",
                click: function(){
                    load_wr('?paginas=h_ver_pedido&local=paginas/home&atendido=1&idpedido='+idpedido, 'verpedidotext', 'GET');
                    closeDialog();
                    setTimeout("load_wr('?paginas=h_pedidos&local=paginas/home', 'pedidos', 'GET')",3100);
                    closeDialog();
                }
            }]
        });
        $("#mws-jui-dialog-mdl-btn").bind("click", function (event) {
            $("#mws-jui-dialog").dialog("option", {
                modal: true
            }).dialog("open");
            event.preventDefault();
            load_wr('?paginas=h_ver_pedido&local=paginas/home&idpedido='+idpedido, 'verpedidotext', 'GET');
        });
        load_wr('?paginas=h_ver_pedido&local=paginas/home&idpedido='+idpedido, 'verpedidotext', 'GET');
    }
}


function buscaUsuariosAjax(){
  $("#LoginBuscaInput").autocomplete({
    source: '?paginas=buscaUsuariosAjax&local=paginas/usuarios/ajax',
    minLength:3,
    select: function(event, ui){
      $(this).val(ui.item.no.toString().trim());
      return false;
    }
  })

}

function editarUsuarioDialog(login,acao){
    var login = login;
    var acao = acao;
    if( $.fn.dialog ) {
        if(acao == 'editar'){
            $("#vizualizarDadosUsuario").dialog({
                autoOpen: true,
                title: "Editar Usuario. Login: "+login,
                modal: true,
                position: {
                    my: "center",
                    at: "center"
                },
                width: "600",
                buttons: [{
                    text: "Fechar",
                    click: function() {
                        setTimeout("load_wr('?paginas=users_todos&local=paginas/usuarios', 'container', 'GET')",100);
                        $( this ).dialog( "close" );
                    }
                }]
            });
            load_wr('?paginas=users_editar_excluir&local=paginas/usuarios&AtualizarDados=1&login='+login, 'vizualizarDadosUsuarioForm', 'GET');
            $( "#vizualizarDadosUsuario" ).dialog( "open" );
        }
        if(acao == 'excluir'){
            $("#vizualizarDadosUsuario").dialog({
                autoOpen: true,
                title: "Excluir Usuario. Login: "+login,
                modal: true,
                width: "600",
                position: {
                    my: "center",
                    at: "center"
                },
                buttons: [{
                    text: "Fechar",
                    click: function() {
                        setTimeout("load_wr('?paginas=users_todos&local=paginas/usuarios', 'container', 'GET')",100);
                        $( this ).dialog( "close" );
                    }
                }]
            });
            load_wr('?paginas=users_editar_excluir&local=paginas/usuarios&excluirUsuario=1&login='+login, 'vizualizarDadosUsuarioForm', 'GET');
        }
        $("#UserInfos").bind("click", function (event) {
            $("#vizualizarDadosUsuario").dialog("option", {
                modal: true
            }).dialog("open");
            event.preventDefault();
        });
    }
}

setInterval(function(){
    $('#tabelapedidos').dataTable({
        'aaSorting': [[ 0, 'desc' ]],
        sPaginationType: "full_numbers",
        "oLanguage": {
            "oPaginate": {
                "sFirst":    "Primeiro",
                "sPrevious": "Anterior",
                "sNext":     "Próximo",
                "sLast":     "Último"
            }
        }
    });

    $('#tabelaUsersPanel').dataTable({
        'aaSorting': [[ 0, 'desc' ]],
        sPaginationType: "full_numbers",
        "oLanguage": {
            "oPaginate": {
                "sFirst":    "Primeiro",
                "sPrevious": "Anterior",
                "sNext":     "Próximo",
                "sLast":     "Último"
            }
        }
    });

    $('#tabelaLogs').dataTable({
        'aaSorting': [[ 0, 'desc' ]],
        sPaginationType: "full_numbers",
        "oLanguage": {
            "oPaginate": {
                "sFirst":    "Primeiro",
                "sPrevious": "Anterior",
                "sNext":     "Próximo",
                "sLast":     "Último"
            }
        }
    });
}, 300);

setInterval(function(){

    $('#mws-validate').validate();

    $('#CadastrarUsers').click(function(){
        $('#processando').show('slow');
    });

    $('#excluirUsuario').click(function(){
        $('#processando2').show('slow');
    });

  $('#mws-validate').ajaxForm({
    target: '#teste',
    success: function() {
      $('#cadastroUsuariosClube').fadeIn('slow').addClass('off');
      $('#resutado').show('slow');
      $('#teste').fadeIn('slow');
    }
  });
  buscaUsuariosAjax();
  $('#FormAtualizarCadastro').validate();

    $('#AtualizarUser').click(function(){
        $('#processandoAtualizarUser').show('slow');
    });

    $('#FormAtualizarCadastro').ajaxForm({
        target: '#teste',
        success: function() {
            $('#FormAtualizarCadastro').fadeIn('slow').addClass('off');
            $('#resutado').show('slow');
            $('#teste').fadeIn('slow');
        }
    });
}, 300);
function CopyRight(){

    if( $.fn.dialog ) {
        $("#mws-jui-dialog").dialog({
            autoOpen: true,
            title: "Informações:",
            modal: true,
            width: "640",
            position: {
                my: "center",
                at: "center"
            },
            buttons: [{
                text: "Fechar",
                click: function () {
                    $(this).dialog("close");
                }
            }]
        });
        $("#mws-jui-dialog-mdl-btn").bind("click", function (event) {
            $("#mws-jui-dialog").dialog("option", {
                modal: true
            }).dialog("open");
            event.preventDefault();
        });
    }
}

load_wr('?paginas=h_esta&local=paginas/home', 'esta', 'GET');

load_wr('?paginas=h_pedidos&local=paginas/home', 'pedidos', 'GET');

load_wr('?paginas=h_u_logs&local=paginas/home', 'ultimoslogs', 'GET');

load_wr('?paginas=h_users_on_panel&local=paginas/home', 'onlinepanel', 'GET');

setInterval("load_wr('?paginas=h_esta&local=paginas/home', 'esta', 'GET')", 60000);

setInterval("load_wr('?paginas=h_u_logs&local=paginas/home', 'ultimoslogs', 'GET')",60000);

setInterval("load_wr('?paginas=h_users_on_panel&local=paginas/home', 'onlinepanel', 'GET')", 60000);

setInterval(function(){
    // Collapsible Panels
    $( '.mws-panel.mws-collapsible' ).each(function(i, element) {
        var p = $( element ),
        header = p.find( '.mws-panel-header' );

        if( header && header.length) {
            var btn = $('<div class="mws-collapse-button mws-inset"><span></span></div>').appendTo(header);
            $('span', btn).on( 'click', function(e) {
                var p = $( this ).parents( '.mws-panel' );
                if( p.hasClass('mws-collapsed') ) {
                    p.removeClass( 'mws-collapsed' )
                    .children( '.mws-panel-inner-wrap' ).hide().slideDown( 250 );
                } else {
                    p.children( '.mws-panel-inner-wrap' ).slideUp( 250, function() {
                        p.addClass( 'mws-collapsed' );
                    });
                }
                e.preventDefault();
            });
        }

        if( !p.children( '.mws-panel-inner-wrap' ).length ) {
            p.children( ':not(.mws-panel-header)' )
            .wrapAll( $('<div></div>').addClass( 'mws-panel-inner-wrap' ) );
        }
    })
},1000);
