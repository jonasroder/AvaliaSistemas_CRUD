function post() {
  const arrayInputs = document.querySelectorAll("[name]");
  const dados = {};

  for (const input of arrayInputs) {
    let value = input.value;
    let name = input.name;

    let checkName = name.split("_");
    let acao = checkName[2];

    if (checkName.length === 5 && (acao == "u" || acao == "i" || acao == "d")) {
      dados[name] = value;
    } else {
      console.log(
        `Nome de Input ${name} esta fora dos parametros e não será enviado!`
      );
    }
  }

  console.log(`dados enviados por post: `);
  console.log(dados);

  $.ajax({
    url: "Core/mysqlControl.php",
    data: dados,
    method: "Post",
  }).done(function () {
    alert("enviado");
  });
}
