function callNewDayPdf(){
    const url = `${BASE_URL}/sales/getEmpPdf`;
    $.ajax({
        type: "POST",
        url: url,
        beforeSend:function(){
            $(".modal").html("Carregando...");
        },
        success:function(html){
            $(".modal").html(html);
            $(".modal").modal('open');
        }
     })
}
function callHtmlNewSale(){
    const url = `${BASE_URL}/sales/addNewSale`;
    $.ajax({
        type: "POST",
        url: url,
        beforeSend:function(){
            $(".modal").html("Carregando...");
        },
        success:function(html){
            $(".modal").html(html);
            $(".modal").modal('open');
        }
     })
}
function callHtmlNewEmployeer(){
    const url = `${BASE_URL}/employeers/addNewEmployeer`;
    $.ajax({
        type: "POST",
        url: url,
        beforeSend:function(){
            $(".modal").html("Carregando...");
        },
        success:function(html){
            $(".modal").html(html);
            $(".modal").modal('open');
        }
     })
}
function callHtmlEditSale(id){
    const url = `${BASE_URL}/sales/editSale/${id}`;
    $.ajax({
        type: "POST",
        url: url,
        beforeSend:function(){
            $(".modal").html("Carregando...");
        },
        success:function(html){
            $(".modal").html(html);
            $(".modal").modal('open');
            
        }
     })
}
function callHtmlEditEmployeer(id){
    const url = `${BASE_URL}/employeers/editEmployeer/${id}`;
    $.ajax({
        type: "POST",
        url: url,
        beforeSend:function(){
            $(".modal").html("Carregando...");
        },
        success:function(html){
            $(".modal").html(html);
            $(".modal").modal('open');
        }
     })
}
function addNewEmployeer(e){
    e.preventDefault();
    const url = `${BASE_URL}/employeers/cpfExist`;
    const urlReg = `${BASE_URL}/employeers/index`;
    const name = $("#nome").val();
    const age = $("#idade").val();
    const salary = $("#salario").val().replace(".","").replace(",",".");
    const cpf = $("#cpf").val();
    var cpf2 = cpf.replace(/[-.]/g,"");
    if(cpf2.length<11){
        Swal.fire({
            title: 'Erro',
            text: 'Cpf faltando digitos',
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText:"Ok",
        })
        return false;
    }
   
    $.ajax({
        type:"POST",
        url: url,
        data: {cpf: cpf},
        success:function(test){
            if(test == true){
                $.ajax({
                    type:"POST",
                    url: urlReg,
                    data: {cpf: cpf,nome: name,idade: age,salario: salary},
                    success: function(data){
                        Swal.fire({
                            icon: 'success',
                            title: 'Cadastrado!',
                            text: 'O Funcionario foi cadastrado com sucesso',
                        }).then(function(){
                            $("body").html(data);
                        }) 
                    }
                })
            }
            else{
                Swal.fire({
                    icon: 'error',
                    title: 'O cpf incorreto',
                    text: 'O cpf informado ja esta cadastrado',
                  }).done($("#cpf").focus())
            }
               
        }

       
     })
    
}
function addNewSale(e){
    e.preventDefault();
    const url = `${BASE_URL}/sales/index`;
    const client = $("#cliente").val();
    const saler = $("#vendedor").val();
    const price = $("#preco").val().replace(".","").replace(",",".");
    $.ajax({
        type:"POST",
        url: url,
        data: {cliente: client,vendedor: saler,preco: price},
        success: function(data){
            Swal.fire({
                icon: 'success',
                title: 'Cadastrada!',
                text: 'A venda foi cadastrada com sucesso',
            }).then(function(){
                $("body").html(data);
            })
        }
    })
}
function sendEmail(e){
    e.preventDefault();
    const url = `${BASE_URL}/sales/empPdf`;
    const vendedor = $("#vendedor").val();
    const email = $("#email").val();
    $.ajax({
        type:"POST",
        url: url,
        data: {vendedor: vendedor,email: email},
        beforeSend:function(){
            Swal.fire({
                title: 'Enviando',
                onBeforeOpen: ()=>{
                    Swal.showLoading()
                }
            })
        },
        success: function(){
            Swal.fire({
                icon: 'success',
                title: 'Relatorio enviado',
                text: 'O relatorio foi enviado com sucesso para o email: ' + email,
            }).then(function(){$('.modal').modal('close')})
        }
    })
}
function editEmployeer(e){
    e.preventDefault();
    const url = `${BASE_URL}/employeers/editCpf`;
    const urlReg = `${BASE_URL}/employeers/index`;
    const eId = $("#eId").val();
    const eName = $("#eNome").val();
    const eAge = $("#eIdade").val();
    const eSalary = $("#eSalario").val().replace(".","").replace(",",".");
    const eCpf = $("#eCpf").val();
    var eCpf2 = eCpf.replace(/[-.]/g,"");
    if(eCpf2.length<11){
        Swal.fire({
            title: 'Erro',
            text: 'Cpf faltando digitos',
            icon: 'error',
            confirmButtonColor: '#3085d6',
            confirmButtonText:"Ok",
        })
        return false;
    }
    $.ajax({
        type:"POST",
        url: url,
        data: {eId: eId, eCpf: eCpf},
        success:function(test){
            if(test == true){
                $.ajax({
                    type:"POST",
                    url: urlReg,
                    data: {eId:eId,eCpf: eCpf,eNome: eName,eIdade: eAge,eSalario: eSalary},
                    success: function(data){
                        Swal.fire({
                            title: 'Alterado!',
                            text: 'O Funcionario foi alterado com sucesso',
                            icon: 'success',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText:"Ok",
                        }).then(function(){
                            $("body").html(data);
                        })
                    }
                })
            }
            else{
                Swal.fire({
                    icon: 'error',
                    title: 'O cpf incorreto',
                    text: 'O cpf informado ja esta cadastrado',
                  }).done($("#cpf").focus())
            }
        }
    })
}
function editSale(e){
    e.preventDefault();
    const url = `${BASE_URL}/sales/index`;
    const eId = $("#eId").val();
    const evendedor = $("#evendedore").val();
    const eSaler = $("#eVendedor").val();
    const ePrice = $("#ePreco").val().replace(".","").replace(",",".");
    const eDate = $("#eDate").val();
    $.ajax({
        type:"POST",
        url: url,
        data: {eId: eId,evendedore: evendedor,eVendedor: eSaler,ePreco: ePrice,eDate:eDate},
        success: function(data){
            Swal.fire({
                title: 'Alterada!',
                text: 'A venda foi alterada com sucesso',
                icon: 'success',
                confirmButtonColor: '#3085d6',
                confirmButtonText:"Ok",
            }).then(function(){
                $("body").html(data);
            })
        }    
    })

}
function delSale(id){
    const url = `${BASE_URL}/sales/delSale/${id}`;
    Swal.fire({
        title: 'Tem certeza que deseja excluir ?',
        text: "Isso não podera ser revertido",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sim, apagar!'
        }).then((result) => {
            if(result.value){
            $.ajax({
            type:"POST",
            url: url,
            success:function(){
                
                    Swal.fire({
                    icon: 'success',
                    title: 'Apagada!',
                    text: 'A venda foi apagada com sucesso',
                    }).then(function(){document.getElementById(id).parentNode.parentNode.remove();})
                }
            
                
            })

            }
        }
        )
}
function delEmployeer(id){
    const url = `${BASE_URL}/employeers/delEmployeer/${id}`;
    Swal.fire({
        title: 'Tem certeza que deseja excluir ?',
        text: "Isso não podera ser revertido",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Sim, apagar!'
        }).then((result) => {
            if(result.value){
            $.ajax({
            type: "POST",
            url: url,
            success:function(data){
                if(data==true){
                    Swal.fire({
                        icon: 'success',
                        title: 'Apagada!',
                        text: 'O funcionario foi apagado com sucesso',
                    }).then(function(){document.getElementById(id).parentNode.parentNode.remove();})
                }
                else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Não foi apagado!',
                        text: 'O funcionario esta ligado a uma venda, então não pode ser apagado',
                    })
                }       
                }
            })

            }
        }
        )
}
function showEmp(e){
    const id = e.target.id;
    $.ajax({
        type:"POST",
        url:`${BASE_URL}/employeers/showEmp`,
        data:{id:id},

        success:function(data){
            $(e.target).attr('data-tooltip',data);
            $(e.target).tooltip().tooltip('open');    
        }
    })
}
