/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function () {
    //DIALOG USUARIOS
    $("#dialog-form").dialog({
        autoOpen: false,
        resizable: true,
        modal: true,
        show: {
            effect: "blind",
            duration: 1000
        },
        hide: {
            effect: "explode",
            duration: 1000,
        },
        buttons: {
            "Guardar": function () {
                $(this).dialog("close");
            },
            Cancelar: function () {
                $(this).dialog("close");
            }
        }
    });
    $(document).on("click", ".create-user", function () {
        $("#dialog-form").dialog("open");
        $("#codigo").val($(this).parent().siblings("#usuarioCodigo").text());
        $("#nom").val($(this).parent().siblings("#usuarioNombre").text());
        $("#categoria").val($(this).parent().siblings("#usuarioCategoria").text());
        $("#email").val($(this).parent().siblings("#usuarioEmail").text());
        $("#permisos").val($(this).parent().siblings("#usuarioPermisos").text());
        $("#login").val($(this).parent().siblings("#usuarioLogin").text());
        $("#pass").val($(this).parent().siblings("#usuarioPass").text());
    });

    //DIALOG CLIENTES
    
    var codCli;
    
    var nomEmpMod;
    var nomConMod;
    var emailMod;
    var tlfMod;
    
    $("#dialog-cliente").dialog({
        autoOpen: false,
        resizable: true,
        modal: true,
        show: {
            effect: "blind",
            duration: 1000
        },
        hide: {
            effect: "explode",
            duration: 1000,
        },
        buttons: {
            "Guardar": function () {
                var nomempCli = $("#nomempCli").val();
                //var codCli = $("#codCli").val();
                var tlfCli = $("#tlfCli").val();
                var emailCli = $("#emailCli").val();
                var nomconCli = $("#nomconCli").val();
                $.post("gestionClienteBBDD.php", {
                    nomempCli: nomempCli,
                    codCli: codCli,
                    tlfCli: tlfCli,
                    emailCli: emailCli,
                    nomconCli : nomconCli,
                    ACTION: "MODIFICAR"
                });
                $(this).dialog("close");
                nomEmpMod.text(nomempCli); 
                nomConMod.text(nomconCli);
                tlfMod.text(tlfCli);
                emailMod.text(emailCli);
            },
            Cancelar: function () {
                $(this).dialog("close");
            }
        }
    });
    $(document).on("click", ".modificarCliente", function () {
        $("#dialog-cliente").dialog("open");
        
        codCli = $(this).parent().siblings("#clienteCodigo").text();
        
        nomEmpMod = $(this).parent().siblings("#clienteNombreEmpresa");
        nomConMod = $(this).parent().siblings("#clienteNombreContacto");
        tlfMod = $(this).parent().siblings("#clienteTlf");
        emailMod = $(this).parent().siblings("#clienteEmail");
        
        $("#codCli").val(codCli);
        $("#nomempCli").val(nomEmpMod.text());
        $("#tlfCli").val(tlfMod.text());
        $("#emailCli").val(emailMod.text());
        $("#nomconCli").val(nomConMod.text());
    });

});


