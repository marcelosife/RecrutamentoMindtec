
function deleteClient (clientid) {  
  console.log('entrou!');
  jQuery.ajax({
	type: "POST",
	url: "client/delete",
	dataType: 'json',
	data: {clientid: clientid},
	success: function(res) {
	  if (res.delete)
	  {        
		alert("Cliente Excluído com Sucesso");
	  }
	  else{
		alert("Erro! cliente possui contatos associados");
	  }
	}
  });
}