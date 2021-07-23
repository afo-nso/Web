const celulas = document.querySelectorAll(".celula");
let checarTurno = true;
const JOGADOR_X="X";
const JOGADOR_O="O";

const COMBINACOES = [
    [0,1,2],
    [3,4,5],
    [6,7,8],
    [0,3,6],
    [1,4,7],
    [2,5,8],
    [0,4,8],
    [2,4,6]
];

document.addEventListener("click",(event)=>{
   if(event.target.matches(".celula")){
    jogar(event.target.id);
   }
});

function jogar(id){
    const celula =document.getElementById(id);
    turno = checarTurno ? JOGADOR_X : JOGADOR_O;
    celula.textContent = turno;
    celula.classList.add(turno);
    checarVencedor(turno);
}

function checarVencedor(turno){
    const vencedor = COMBINACOES.some((comb)=>{
        return comb.every((index) =>{
           return celulas[index].classList.contains(turno);
        })
    });
    if(vencedor){
        encerrarjogo(turno);
    }else if(checarEmpate()){
        encerrarjogo();
    }else{
        checarTurno = !checarTurno;
    }
}

function checarEmpate(){
    let x =0;
    let o = 0;
    for(index in celulas){
        if(!isNaN(index)){
            if (celulas[index].classList.contains(JOGADOR_X)) {
                x++;
            }
            if (celulas[index].classList.contains(JOGADOR_O)) {
                o++;
            }
        }
    }
    return x + o === 9 ? true : false;
}
function encerrarjogo(vencedor = null){
   const telaescura= document.getElementById("tela-escura");
   const h2 =document.createElement("h2");
   const h3 =document.createElement("h3");
   let mensagem = null;

   telaescura.style.display="block";
   telaescura.appendChild(h2);
   telaescura.appendChild(h3);
    if (vencedor) {
        h2.innerHTML = `O player <span>${vencedor}</span> venceu`;
    }else{
        h2.innerHTML = "Empatou ";
    }
    let contador = 3;
    setInterval(()=>{
        h3.innerHTML = `Reiniciando em ${contador--}`;
    },1000);
    setInterval(()=> location.reload(),4000);
}