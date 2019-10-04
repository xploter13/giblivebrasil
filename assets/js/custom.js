/*--------------------------------------
 * Author:       Luiz Fernando Venturelli
 * Created:      28/01/2016
 * Last change:  
 -----------------------------------------*/

//Production
//BASEURL = window.location.origin + '/';
//Localhost
BASEURL = window.location.origin + '/giblivebrasil/';

/**
 * GENERAL
 */

$(document).ready(function() {
    $(".input-focus").focus();
    $("#btn-submit-login").html('Entrar');

    //habilita o input senha se o botão for checkado
    $("#cbkUpdatePass").on("click", function() {
        if ($(this).prop("checked")) {
            $("#inputPass").attr('disabled', false);
            $("#inputPass").focus();
        } else {
            $("#inputPass").attr('disabled', true);
        }
    });

    $("#guarantor").hide();
    $("#cmbGuarantor").change(function() {
        //var option = $("#cmbGuarantor").val();
        $("#guarantor").toggle();
    });

});


/*
 * Calculo de Data
 * $("#cmbPeriCont").change(function () {
 var dataLocIni = $("#inputDateLocIni").val();
 
 //console.log(total);
 }); */


/***********************************
 MODULOS
 **********************************/

/**
 * LOGIN
 */
$('#frm-login').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        var dados = $(this).serialize();
        console.log(dados);
        $.ajax({
            type: 'POST',
            url: BASEURL + 'home/check_login',
            data: dados,
            beforeSend: function() {
                $("#btn-submit-login").html('Carregando...' + ' <img src="assets/img/gif/ajax-loader.gif">');
            },
            success: function(data) {
                console.log(data);
                if (data === 'TRUE') {
                    $(location).attr('href', BASEURL + 'dashboard');
                } else if (data === 'FALSE') {
                    msg('Login ou Senha inválidos!', 'erro');
                    $("#btn-submit-login").html('Entrar');
                }
            },
            error: function() {
                console.log(data);
                msg("Erro ao logar, consulte o administrador do sistema!", "erro");
                $("#btn-submit-login").html('Entrar');
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});


/**
 * CLIENTE - NOVO
 */
$('#frm-cli').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        var dados = $(this).serialize();
        //console.log(dados);
        $.ajax({
            type: 'POST',
            url: BASEURL + 'cliente/setInsert',
            data: dados,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal("", "Registros cadastrados com sucesso!", "success");
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'cliente');
                    }, 3000);
                } else if (data === 'FALSE') {
                    swal("", "Erro ao cadastrar!", "warning");
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});



/**
 * CLIENTE - EDITAR
 */
$('#frm-cli-edit').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        var dados = $(this).serialize();
        //console.log(dados);
        $.ajax({
            type: 'POST',
            url: BASEURL + 'cliente/setEdit',
            data: dados,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal("", "Registros atualizados com sucesso!", "success");
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'cliente');
                    }, 3000);
                } else if (data === 'FALSE') {
                    swal("", "Erro ao atualizar!", "warning");
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});



/**
 * CLIENTE - DELETE 
 */
$(".btn-delete-cli").on('click', function() {
    var dados = 'id=' + $(this).attr("data-id");
    //console.log(dados);
    swal({
        title: 'Atenção',
        text: "Deseja realmente excluir este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não'
    }).then(function() {
        $.ajax({
            type: 'POST',
            url: BASEURL + 'cliente/setDelete',
            data: dados,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal('Excluido!', 'Registro excluído com sucesso.', 'success');
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'cliente');
                    }, 2000);
                } else if (data === 'FALSE') {
                    swal('', 'Erro ao excluir registro!', 'warning');
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });
    });
});



/**
 * PROPRIETARIO - NOVO
 */
$('#frm-prop').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        var dados = $(this).serialize();
        //console.log(dados);
        $.ajax({
            type: 'POST',
            url: BASEURL + 'proprietario/setInsert',
            data: dados,
            beforeSend: function() {
                msg('Aguarde...', 'info');
            },
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal("", "Registros cadastrados com sucesso!", "success");
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'proprietario');
                    }, 3000);
                } else if (data === 'FALSE') {
                    swal("", "Erro ao cadastrar!", "warning");
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});

/**
 * PROPRIETARIO - EDITAR
 */
$('#frm-prop-edit').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        var dados = $(this).serialize();
        //console.log(dados);
        $.ajax({
            type: 'POST',
            url: BASEURL + 'proprietario/setEdit',
            data: dados,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal("", "Registros atualizados com sucesso!", "success");
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'proprietario');
                    }, 3000);
                } else if (data === 'FALSE') {
                    swal("", "Erro ao atualizar registro!", "warning");
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});

/**
 * PROPRIETARIO - DELETE 
 */
$(".btn-delete-propri").on('click', function() {
    var dados = 'id=' + $(this).attr("data-id");
    //console.log(dados);
    swal({
        title: 'Atenção',
        text: "Deseja realmente excluir este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não'
    }).then(function() {
        $.ajax({
            type: 'POST',
            url: BASEURL + 'proprietario/setDelete',
            data: dados,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal('Excluido!', 'Registro excluído com sucesso.', 'success');
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'proprietario');
                    }, 2000);
                } else if (data === 'FALSE') {
                    swal('', 'Erro ao excluir registro!', 'warning');
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });
    });
});


/**
 * CRM - NOVO
 */
$('#frm-crm').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        var dados = $(this).serialize();
        //console.log(dados);
        $.ajax({
            type: 'POST',
            url: BASEURL + 'crm/setInsert',
            data: dados,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal("", "Registros cadastrados com sucesso!", "success");
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'crm');
                    }, 3000);
                } else if (data === 'FALSE') {
                    swal("", "Erro ao atualizar!", "warning");
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});

/**
 * CRM - EDITAR
 */
$('#frm-crm-edit').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        var dados = $(this).serialize();
        //console.log(dados);
        $.ajax({
            type: 'POST',
            url: BASEURL + 'crm/setEdit',
            data: dados,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal("", "Registros atualizados com sucesso!", "success");
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'crm');
                    }, 3000);
                } else if (data === 'FALSE') {
                    swal("", "Erro ao atualizar!", "warning");
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});


/**
 * CRM - DELETE 
 */
$(".btn-delete-crm").on('click', function() {
    var dados = 'id=' + $(this).attr("data-id");
    //console.log(dados);
    swal({
        title: 'Atenção',
        text: "Deseja realmente excluir este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não'
    }).then(function() {
        $.ajax({
            type: 'POST',
            url: BASEURL + 'crm/setDelete',
            data: dados,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal('Excluido!', 'Registro excluído com sucesso.', 'success');
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'crm');
                    }, 2000);
                } else if (data === 'FALSE') {
                    swal('', 'Erro ao excluir registro!', 'warning');
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });
    });
});


/**
 * FUNCIONARIO - NOVO
 */
$('#frm-func').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        var dados = $(this).serialize();
        //console.log(dados);
        $.ajax({
            type: 'POST',
            url: BASEURL + 'funcionario/setInsert',
            data: dados,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal("", "Registros cadastrados com sucesso!", "success");
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'funcionario');
                    }, 3000);
                } else if (data === 'FALSE') {
                    swal("", "Erro ao cadastrar!", "warning");
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });
        // Cancela o submit do form
        e.preventDefault();
    }
});


/**
 * FUNCIONARIO - EDITAR
 */
$('#frm-func-edit').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        var dados = $(this).serialize();
        //console.log(dados);
        $.ajax({
            type: 'POST',
            url: BASEURL + 'funcionario/setEdit',
            data: dados,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal("", "Registros atualizados com sucesso!", "success");
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'funcionario');
                    }, 3000);
                } else if (data === 'FALSE') {
                    swal("", "Erro ao atualizar!", "warning");
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});


/**
 * FUNCIONARIO - DELETE 
 */
$(".btn-delete-func").on('click', function() {
    var dados = 'id=' + $(this).attr("data-id");
    swal({
        title: 'Atenção',
        text: "Deseja realmente excluir este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não'
    }).then(function() {
        $.ajax({
            type: 'POST',
            url: BASEURL + 'funconario/setDelete',
            data: dados,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal('Excluido!', 'Registro excluído com sucesso.', 'success');
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'funcionario');
                    }, 2000);
                } else if (data === 'FALSE') {
                    swal('', 'Erro ao excluir registro!', 'warning');
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });
    });
});


/**
 * USUARIO - NOVO
 */
$('#frm-user').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        var dados = $(this).serialize();
        //console.log(dados);
        $.ajax({
            type: 'POST',
            url: BASEURL + 'usuario/setInsert',
            data: dados,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal("", "Registros cadastrados com sucesso!", "success");
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'usuario');
                    }, 3000);
                } else if (data === 'FALSE') {
                    swal("", "Erro ao cadastrar!", "warning");
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});


/**
 * USUARIO - EDITAR
 */
$('#frm-user-edit').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        var dados = $(this).serialize();
        //console.log(dados);
        $.ajax({
            type: 'POST',
            url: BASEURL + 'usuario/setEdit',
            data: dados,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal("", "Registros atualizados com sucesso!", "success");
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'usuario');
                    }, 3000);
                } else if (data === 'FALSE') {
                    swal("", "Erro ao atualizar!", "warning");
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});

/**
 * RECEBIMENTO - NOVO
 */
$('#frm-rec').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        var dados = $(this).serialize();
        //console.log(dados);
        $.ajax({
            type: 'POST',
            url: BASEURL + 'recebimento/setInsert',
            data: dados,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal("", "Pagamento recebido com sucesso!", "success");
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'recebimmento');
                    }, 3000);
                } else if (data === 'FALSE') {
                    swal("", "Erro ao cadastrar!", "warning");
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});


/**
 * RECEBIMENTO - EDITAR
 */
$('#frm-rec-edit').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        var dados = $(this).serialize();
        //console.log(dados);
        $.ajax({
            type: 'POST',
            url: BASEURL + 'recebimento/setEdit',
            data: dados,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal("", "Registros atualizados com sucesso!", "success");
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'recebimento');
                    }, 3000);
                } else if (data === 'FALSE') {
                    swal("", "Erro ao atualizar!", "warning");
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });
        // Cancela o submit do form
        e.preventDefault();
    }
});



/**
 * RECEBIMENTO - DELETE 
 */
$(".btn-delete-rec").on('click', function() {
    var dados = 'id=' + $(this).attr("data-id");
    //console.log(dados);
    swal({
        title: 'Atenção',
        text: "Deseja realmente excluir este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não'
    }).then(function() {
        $.ajax({
            type: 'POST',
            url: BASEURL + 'recebimento/setDelete',
            data: dados,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal('Excluido!', 'Registro excluído com sucesso.', 'success');
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'recebimento');
                    }, 2000);
                } else if (data === 'FALSE') {
                    swal('', 'Erro ao excluir registro!', 'warning');
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });
    });
});


/**
 * IMOVEL - NOVO
 */
$('#frm-imo').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        //console.log('Validou!!');
    } else {
        var form = new FormData($('#frm-imo')[0]);
        //console.log(form);
        $.ajax({
            url: BASEURL + 'imovel/setInsert',
            type: "POST",
            data: form,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal("", "Registros cadastrador com sucesso!", "success");
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'imovel');
                    }, 3000);
                } else if (data === 'FALSE') {
                    swal("", "Erro ao cadastrar!", "warning");
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });
        // Cancela o submit do form
        e.preventDefault();
    }
});


/**
 * IMOVEL - EDITAR
 */
$('#frm-imo-edit').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        var form = new FormData($("#frm-imo-edit")[0]);
        //console.log(form);
        $.ajax({
            url: BASEURL + 'imovel/setEdit',
            type: "POST",
            data: form,
            mimeType: "multipart/form-data",
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal("", "Registros atualizados com sucesso!", "success");
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'imovel');
                    }, 3000);
                } else if (data === 'FALSE') {
                    swal("", "Erro ao atualizar!", "warning");
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });
        // Cancela o submit do form
        e.preventDefault();
    }
});



/**
 * IMOVEL - DELETE 
 */
$(".btn-delete-imo").on('click', function() {
    var dados = 'id=' + $(this).attr("data-id");
    //console.log(dados);
    swal({
        title: 'Atenção',
        text: "Deseja realmente excluir este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não'
    }).then(function() {
        $.ajax({
            type: 'POST',
            url: BASEURL + 'imovel/setDelete',
            data: dados,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal('Excluido!', 'Registro excluído com sucesso.', 'success');
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'imovel');
                    }, 2000);
                } else if (data === 'FALSE') {
                    swal('', 'Erro ao excluir registro!', 'warning');
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });
    });
});


/**
 * LOCACAO - NOVO
 */
$('#frm-loc').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        var dados = $(this).serialize();
        //console.log(dados);
        $.ajax({
            type: 'POST',
            url: BASEURL + 'locacao/setInsert',
            data: dados,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal("", "Registros cadastrador com sucesso!", "success");
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'locacao');
                    }, 3000);
                } else if (data === 'FALSE') {
                    swal("", "Erro ao cadastrar!", "warning");
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });
        // Cancela o submit do form
        e.preventDefault();
    }
});


/**
 * LOCACAO - EDITAR
 */
$('#frm-loc-edit').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        var dados = $(this).serialize();
        //console.log(dados);
        $.ajax({
            type: 'POST',
            url: BASEURL + 'locacao/setEdit',
            data: dados,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal("", "Registros atualizados com sucesso!", "success");
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'locacao');
                    }, 3000);
                } else if (data === 'FALSE') {
                    swal("", "Erro ao atualizar!", "warning");
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});


/**
 * LOCACAO - DELETE 
 */
$(".btn-delete-loc").on('click', function() {
    var dados = 'id=' + $(this).attr("data-id");
    //console.log(dados);
    swal({
        title: 'Atenção',
        text: "Deseja realmente excluir este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não'
    }).then(function() {
        $.ajax({
            type: 'POST',
            url: BASEURL + 'locacao/setDelete',
            data: dados,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal('Excluido!', 'Registro excluído com sucesso.', 'success');
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'locacao');
                    }, 2000);
                } else if (data === 'FALSE') {
                    swal('', 'Erro ao excluir registro!', 'warning');
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });
    });
});

/**
 * AUDITORIA - NOVO
 */
$('#frm-audi').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        var dados = $("#frm-audi").serialize();        
        $.ajax({
            url: BASEURL + 'auditoria/setInsert',
            type: "POST",
            data: dados,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal("", "Registros cadastrados com sucesso!", "success");
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'auditoria');
                    }, 3000);
                } else if (data === 'FALSE') {
                    swal("", "Erro ao cadastrar!", "warning");
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});


/**
 * AUDITORIA - EDITAR
 */
$('#frm-audi-edit').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        var dados = $("#frm-audi-edit").serialize();
        $.ajax({
            url: BASEURL + 'auditoria/setEdit',
            type: "POST",
            data: dados,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal("", "Registros atualizados com sucesso!", "success");
                    setTimeout(function() {
                        $(location).attr('href', BASEURL + 'auditoria');
                    }, 3000);
                } else if (data === 'FALSE') {
                    swal("", "Erro ao atualizar!", "warning");
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });

        // Cancela o submit do form
        e.preventDefault();
    }
});

/**
 * AUDITORIA - DELETE 
 */
$(".btn-delete-auditoria").on('click', function() {
    var dados = 'id=' + $(this).attr("data-id");
    //console.log(dados);
    swal({
        title: 'Atenção',
        text: "Deseja realmente excluir este registro?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Sim',
        cancelButtonText: 'Não'
    }).then(function() {
        $.ajax({
            type: 'POST',
            url: BASEURL + 'auditoria/setDelete',
            data: dados,
            success: function(data) {
                //console.log(data);
                if (data === 'TRUE') {
                    swal('Excluido!', 'Registro excluído com sucesso.', 'success');
                    setTimeout(function() {
                        $(location).attr('href', '');
                    }, 2000);
                } else if (data === 'FALSE') {
                    swal('', 'Erro ao excluir registro!', 'warning');
                }
            },
            error: function() {
                swal("", "Erro na operação, consulte o administrador do sistema!", "warning");
            }
        });
    });
});


/**
 * EMITIR CONTRATO
 */
$('#frm-emit-contract').validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        console.log('Validou!!');
    } else {
        var dados = $("#frm-emit-contract").serialize();
        //console.log(dados);
        $.ajax({
            url: BASEURL + 'contrato/generateContract',
            type: "POST",
            data: dados,
            beforeSend: function() {
                //msg('gerando contrato...aguarde...', 'info');
            },
            success: function(data) {
                //console.log(data);
                if (data === 'FALSE') {
                    msg('Erro ao gerar contrato!', 'erro');
                    setTimeout(function() {
                        $(location).attr('href', '');
                    }, 3000);
                } else {
                    tinymce.editors[0].setContent(data);
                }
            },
            error: function() {
                msg("Erro ao atualizar, consulte o administrador do sistema!", "erro");
                /*setTimeout(function () {
                 $(location).attr('href', '');
                 }, 3000); */
            }
        });
        // Cancela o submit do form
        e.preventDefault();
    }
});

/***********************************
 BUSCA IMOVEL
 **********************************/

$(function() {
    $("#inputPropri").change(function() {
        var dados = 'id=' + $("#inputPropri").val();
        //console.log(dados);
        $.ajax({
            type: "POST",
            url: BASEURL + 'Loading_Imovel',
            beforeSend: function() {
                $(".loading-city").fadeIn(function() {
                    $(this).html("carregando...");
                });
            },
            data: dados,
            success: function(data) {
                $(".loading-city").fadeOut('slow');
                //console.log(data);
                $("#cmb-city").html(data);
            }
        });
    });
});


/***********************************
 BUSCA CIDADE
 **********************************/

$(function() {
    $("#cmb-uf").change(function() {
        var dados = 'id=' + $("#cmb-uf").val();
        //console.log(dados);
        $.ajax({
            type: "POST",
            url: BASEURL + 'Loading_City',
            beforeSend: function() {
                $(".loading-city").fadeIn(function() {
                    $(this).html("carregando...");
                });
            },
            data: dados,
            success: function(data) {
                $(".loading-city").fadeOut('slow');
                //console.log(data);
                $("#cmb-city").html(data);
            }
        });
    });
});


/***********************************
 BUSCA CIDADE - FIADOR
 **********************************/

$(function() {
    $("#cmb-uf-guar").change(function() {
        var dados = 'id=' + $("#cmb-uf-guar").val();
        //console.log(dados);
        $.ajax({
            type: "POST",
            url: BASEURL + 'Loading_City',
            beforeSend: function() {
                $(".loading-city-guar").fadeIn(function() {
                    $(this).html("carregando...");
                });
            },
            data: dados,
            success: function(data) {
                $(".loading-city-guar").fadeOut('slow');
                //console.log(data);
                //$("#cmb-city").html(data);
                $("#cmb-city-guar").html(data).promise().done(function() {
                    loadSelect();
                });
            }
        });
    });
});

/***********************************
 BUSCA IMOVEL - MODULO LOCAÇÃO
 **********************************/

$(function() {
    $("#cmbLoc").change(function() {
        var dados = 'id=' + $("#cmbLoc").val();
        //console.log(dados);
        $.ajax({
            type: "POST",
            url: BASEURL + 'Loading_Immobile',
            beforeSend: function() {
                $(".loading-immobile").fadeIn(function() {
                    $(this).html("carregando...");
                });
            },
            data: dados,
            success: function(data) {
                $(".loading-immobile").fadeOut('slow');
                //console.log(data);
                //$("#cmb-city").html(data);
                $("#cmb-immobile").html(data).promise().done(function() {
                    loadSelect();
                });
            },
            error: function(data) {
                //console.log(data);
            }
        });
    });
});


/*
 calc_digitos_posicoes
 
 Multiplica dígitos vezes posições
 
 @param string digitos Os digitos desejados
 @param string posicoes A posição que vai iniciar a regressão
 @param string soma_digitos A soma das multiplicações entre posições e dígitos
 @return string Os dígitos enviados concatenados com o último dígito
 */
function calc_digitos_posicoes(digitos, posicoes = 10, soma_digitos = 0) {

    // Garante que o valor é uma string
    digitos = digitos.toString();

    // Faz a soma dos dígitos com a posição
    // Ex. para 10 posições:
    //   0    2    5    4    6    2    8    8   4
    // x10   x9   x8   x7   x6   x5   x4   x3  x2
    //   0 + 18 + 40 + 28 + 36 + 10 + 32 + 24 + 8 = 196
    for (var i = 0; i < digitos.length; i++) {
        // Preenche a soma com o dígito vezes a posição
        soma_digitos = soma_digitos + (digitos[i] * posicoes);

        // Subtrai 1 da posição
        posicoes--;

        // Parte específica para CNPJ
        // Ex.: 5-4-3-2-9-8-7-6-5-4-3-2
        if (posicoes < 2) {
            // Retorno a posição para 9
            posicoes = 9;
        }
    }

    // Captura o resto da divisão entre soma_digitos dividido por 11
    // Ex.: 196 % 11 = 9
    soma_digitos = soma_digitos % 11;

    // Verifica se soma_digitos é menor que 2
    if (soma_digitos < 2) {
        // soma_digitos agora será zero
        soma_digitos = 0;
    } else {
        // Se for maior que 2, o resultado é 11 menos soma_digitos
        // Ex.: 11 - 9 = 2
        // Nosso dígito procurado é 2
        soma_digitos = 11 - soma_digitos;
    }

    // Concatena mais um dígito aos primeiro nove dígitos
    // Ex.: 025462884 + 2 = 0254628842
    var cpf = digitos + soma_digitos;

    // Retorna
    return cpf;

} // calc_digitos_posicoes

/*
 Valida CPF
 
 Valida se for CPF
 
 @param  string cpf O CPF com ou sem pontos e traço
 @return bool True para CPF correto - False para CPF incorreto
 */
function valida_cpf(valor) {
    // Garante que o valor é uma string
    valor = valor.toString();
    // Remove caracteres inválidos do valor
    valor = valor.replace(/[^0-9]/g, '');
    // Captura os 9 primeiros dígitos do CPF
    // Ex.: 02546288423 = 025462884
    var digitos = valor.substr(0, 9);
    // Faz o cálculo dos 9 primeiros dígitos do CPF para obter o primeiro dígito
    var novo_cpf = calc_digitos_posicoes(digitos);
    // Faz o cálculo dos 10 dígitos do CPF para obter o último dígito
    var novo_cpf = calc_digitos_posicoes(novo_cpf, 11);
    // Verifica se o novo CPF gerado é idêntico ao CPF enviado
    if (novo_cpf === valor) {
        // CPF válido
        return true;
    } else {
        // CPF inválido
        return false;
    }
} // valida_cpf


// Aciona a validação ao sair do input
$('#inputCPF-1').blur(function() {
    // O CPF ou CNPJ
    var cpf = $(this).val();
    // Testa a validação
    if (!valida_cpf(cpf)) {
        swal("ATENÇÃO,", "CPF inválido.", "warning");
        $(this).val("");
    }
});

$('#inputCPF-2').blur(function() {
    // O CPF ou CNPJ
    var cpf = $(this).val();
    // Testa a validação
    if (!valida_cpf(cpf)) {
        swal("", "CPF Inválido", "warning");
        $(this).val("");
    }
});

/**
 * FUNCAO DE VALIDACAO
 * 
 */
function msg(msg, tipo) {
    var retorno = $(".msg");
    var tipo = (tipo === 'sucesso') ? 'success' : (tipo === 'alerta') ? 'warning' : (tipo === 'erro') ? 'danger' : (tipo === 'info') ? 'info' : alert('INFORME MENSAGENS DE SUCESSO, ALERTA, ERRO E INFO');
    retorno.empty().fadeOut('fast', function() {
        return $(this).html('<div class="alert alert-' + tipo + '">' + msg + '</div>').fadeIn('slow');
    });
    //esconde a div depois de 3 segundos
    setTimeout(function() {
        retorno.fadeOut('slow');
    }, 3000);
}