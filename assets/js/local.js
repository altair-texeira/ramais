/* 
 * Filtra conteudo da coluna para lista de servidores
 */
$(function(){
    $("#servidor-table input").keyup(function(){       
        var index = $(this).parent().index();
        var nth = "#servidor-table td:nth-child("+(index+1).toString()+")";
        var valor = $(this).val().toUpperCase();
        $("#servidor-table tbody tr").show();
        $(nth).each(function(){
            if($(this).text().toUpperCase().indexOf(valor) < 0){
                $(this).parent().hide();
            }
        });
    });
 
    $("#servidor-table input").blur(function(){
        $(this).val("");
    });
});

/* 
 * Filtra os conteudos da lista de servidores para 
 * cadastro e alteracao de usuario
 */
$(function(){
    $("#txtBusca").keyup(function()
    {
        var texto = $(this).val();
        $("#servidor-lista li").css("display", "block");
        $("#servidor-lista li").each(function()
        {
            if($(this).text().indexOf(texto) < 0)
               $(this).css("display", "none");
        });
    });
});

/* 
 * Carrega os valores clicados para o campo a ser preenchido
 * em cadastro e alteracao de usuario
 */
$('#servidor-lista').on('click', 'a', function(e)
{
        e.preventDefault();
        var link = $(this);
        var id = link.attr('data-id');
        var nome = link.attr('data-nome');

        $('#id_servidor').val(id);
        $('#nome_servidor').val(nome);
        $('#sel_serv').modal('hide');
});

/* 
 * Testa se as duas senhas sao iguais para
 * cadastro e alteracao de usuario
 */
function validarSenha()
{
        senha = document.usuario.senha.value
        re_senha = document.usuario.re_senha.value
        if (senha == re_senha)
        {
             document.getElementById("re_senha").style.display = "none";
        }
        else
        {
            if($('#confirm').modal('show'))
            {
                $('#alert').html('Senhas diferentes.')
            }
            else
            {
                alert('Erro no modal.')
            }
        }

};

/* 
 * Exibe alert de confirmacao de exclusao de usuario
 * para cadastro e alteracao de usuario
 */
$('#excluir').on('click', 'a', function(e)
{
                e.preventDefault();
                var link = $(this);
                var id = link.attr('data-id');
                $('#confirm').modal('show');
                $('#alert').html('Confirma a exclusão do usuário?');
});
