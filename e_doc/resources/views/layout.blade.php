<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<style>
    .container {
  max-width: 800px;
  margin: 0 auto;
  padding: 20px;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  border-radius: 5px;
  background-color: #fff;
}

.card-header {
  font-size: 1.5em;
  font-weight: bold;
  /* text-align: center; */
  display: flex;
  border-bottom: 1px solid #ccc;
  align-items: center;
  justify-content: center;
}
select{
    padding:0.375rem .75rem !important;
}

#submit {
  align-items: center;
  appearance: none;
  background-color: #009999;
  background-size: calc(100% + 20px) calc(100% + 20px);
  border-radius: 100px;
  border-width: 0;
  box-shadow: none;
  box-sizing: border-box;
  color: #fff;
  display: inline-flex;
  font-family: CircularStd,sans-serif;
  font-size: 1rem;
  height: auto;
  justify-content: center;
  line-height: 1.5;
  padding: 6px 20px;
  position: relative;
  text-align: center;
  text-decoration: none;
  transition: background-color .2s,background-position .2s;
  /* user-select: none; */
  /* -webkit-user-select: none; */
  /* touch-action: manipulation; */
  vertical-align: top;
  white-space: nowrap;
  cursor:default;
}
#submit:not(:disabled){
    cursor: pointer;
}
#submit:active,
#submit:focus {
  outline: none;
}

#submit:hover {
  background-position: -20px -20px;
}

#submit:focus:not(:active) {
  box-shadow: rgba(40, 170, 255, 0.25) 0 0 0 .125em;
}

.card-body {
  padding: 20px;
}

label {
  font-weight: bold;
}
select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  box-sizing: border-box;
  border: 1px solid #ccc;
  border-radius: 25px;
}

button[type="submit"] {
  background-color: #009999;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 25px;
  cursor: pointer;
}

button[type="submit"]:hover {
  background-color: #006666;
}

.form-control.is-invalid {
  border-color: #dc3545;
}

.invalid-feedback {
  color: #dc3545;
  font-size: 0.8em;
}

.alert {
  padding: 20px;
  margin-bottom: 20px;
  border: 1px solid transparent;
  border-radius: 5px;
}

.alert-danger {
  background-color: #f2dede;
  border-color: #dc3545;
  color: #dc3545;
}

.alert-success {
  background-color: #d4edda;
  border-color: #28a745;
  color: #28a745;
}
body {
    min-height: 100vh;
}
head,body{
    background: linear-gradient(to bottom, white, Teal);
} 
input{
    border-radius:30px;
}
input:focus{
    /* box-shadow: none !important; */
    outline: rgba(0, 153, 153, 0.5) !important;
    /* box-shadow: 0 0 0 .2rem transparent ; */
    box-shadow: 0 0 0 .2rem rgba(0, 153, 153, 0.5) !important;
    border-color:  #DB9370 !important;

}
nav{
  color: white;
  font-family: system-ui;
}
.navbar-center {
        margin-left : center; 
        margin-left: auto;
        margin-right: auto;
    }
img.navbar-center {
    margin-left: auto;
    display: block;
    /* margin-left: auto; */
    /* margin-right: auto;*/
    height :80px;
}
.card {
    box-shadow: 10px 10px 10px #009999;
}
#divbtn{
    margin-left: 49.333% !important;
}

</style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>e-DOC</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body >
    <div class= "app" id="app">
        <nav class="navbar navbar-expand-md shadow-sm "  style="background-color:#009999 ;">
            <div class="navbar-center">
                <a class="navbar-center" >
                    <img alt="Logo" src="logo.png" class="navbar-center">
                    <span class="stylelogo">"Get your document with a click"</span>
                </a>
              
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
    <script>
        let data;
        var ajax = new XMLHttpRequest();
        ajax.open("GET", "/d", true);
        ajax.send();
        ajax.onreadystatechange=function(){
            console.log("cc1");
            if(this.readyState == 4 && this.status ==200){
                console.log("cc2");
                data=JSON.parse(this.responseText);
                let erreur=0;
                let codeInput= document.getElementById('codeApogee');
                //console.log("");
                let codeCNE=document.getElementById('cne');
                let email=document.getElementById('emailStudent');
                let releveNote=document.getElementById('releveNote');
                let attestaScolarite=document.getElementById('attestaScolarite');
                let conventionDeStage=document.getElementById('conventionDeStage');
                let semestre1=document.getElementById('semestre1');
                let semestre2=document.getElementById('semestre2');
                let tous=document.getElementById('tous');
                let startDate=document.getElementById('startDate');
                let endDate=document.getElementById('endDate');
                //let directeur=document.getElementById('director');
                startDate.addEventListener('change', verificDateStage);
                endDate.addEventListener('change', verificDateStage);
                const tGi =["2AP1","2AP2","GI1","GI2" ,"GI3"];
                const tGstr =["2AP1","2AP2","GSTR1","GSTR2" ,"GSTR3"];
                const tGm =["2AP1","2AP2","GM1","GM2" ,"GM3"];
                const calendrier=["2017/2018", "2018/2019", "2019/2020", "2020/2021", "2021/2022", "2022/2023"];
                releveNote.addEventListener('click', ()=>{
                    document.getElementById("submit").removeAttribute('disabled');
                    dNoneTousForm();
                    findNiveau();
                    //findSemestre();
                    document.getElementsByClassName('releveNote')[0].classList.remove('d-none');

                });
                document.getElementById('niveau').addEventListener('click', ()=>{
                    try{
                    semestre1.classList.add("d-none");
                    semestre2.classList.add("d-none");
                    tous.classList.add("d-none");
                    findSemestre();
                    findAnnees();
                    }
                    catch(e) {
                        alert(e);
                    }
                });
                document.getElementById('niveauA').addEventListener('click', ()=>{
                    findAnnees(); 
                    })
                conventionDeStage.addEventListener('click', ()=>{
                    document.getElementById("submit").setAttribute('disabled', true);
                    dNoneTousForm();
                    document.getElementsByClassName('conventionStage')[0].classList.remove('d-none');
                });
                attestaScolarite.addEventListener('click', ()=>{
                    document.getElementById("submit").removeAttribute('disabled');
                    dNoneTousForm();
                    findNiveau();
                    findAnnees();
                    document.getElementsByClassName('attestationSchool')[0].classList.remove('d-none');
                });
                //let radio=document.getElementById('radio');
                let btn=document.getElementById('submit');
                // radio.addEventListener('click', ()=>{
                //     btn.setAttribute('disabled', 'false');
                // });
               // radio.forEach(verify);
            //     function verify(ele){
            //     ele.addEventListener('mousedown',()=>{
            //         btn.setAttribute('disabled', 'false');
            //     });
            // }
                codeInput.addEventListener('blur',()=>{
                //codeInput.value
                let see= data.find(compareCodeApogee);
                fixBorderColor(codeInput, see);
                seeAll();
               
        });
                codeCNE.addEventListener('blur',()=>{
                //codeInput.value
                let see= data.find(compareCNE);
                fixBorderColor(codeCNE, see);
                seeAll();
                
               
        });
                email.addEventListener('blur',()=>{
                //codeInput.value
                let see= data.find(compareEmail);
                fixBorderColor(email, see);
                seeAll();
               
        });
        function verificDateStage(){
            erreur=0;
            document.getElementById("submit").setAttribute('disabled', 'true');
            startDate.style.border="solid #ced4da thin";
            endDate.style.border="solid #ced4da thin";

            document.getElementById('erreurDateS').innerHTML="";
            document.getElementById('erreurDateE').innerHTML="";
                    let dateEEntered=new Date(endDate.value);
                    let dateSEntered=new Date(startDate.value);
                    /*uuuuuuuuppppp*/
                    if(dateSEntered!="" && dateSEntered <= new Date()){
                        startDate.style.border="solid red";
                        erreur=1;
                        document.getElementById('erreurDateS').textContent="La date est inférieur à la date actuelle";
                    }
                    if(endDate.value!="" && startDate.value!=""){
                        if(dateSEntered >= dateEEntered){
                            startDate.style.border="solid red";
                            endDate.style.border="solid red";
                        document.getElementById('erreurDateE').textContent="La date du fin du stage est antérieur à sa date de début";
                        erreur=1;
                        }
                        if(erreur == 0){
                        document.getElementById("submit").removeAttribute('disabled');
                    }
                    }
                    
                }
        let p;
         function findSemestre(){
            try{
                document.getElementById('allSemesters').removeChild(p);
            }catch(e){
                
            }
            let d = new Date();
            let month = d.getMonth()+1;
            let niveauEntered=document.getElementById('niveau').value;
            let element=data.find(compareRow);
        
           if(element!=undefined){
            if(element.niveau === niveauEntered){
                if(month>=1 && month<=6){
                    semestre1.classList.remove('d-none');
                }
                else if(month>=7 && month <=9){
                    semestre1.classList.remove('d-none');
                    semestre2.classList.remove('d-none');
                    tous.classList.remove('d-none');
                }else{
                    //document.getElementById('niveau').removeChild(actualNiv);
                    
                }
            }else{
                semestre1.classList.remove('d-none');
                semestre2.classList.remove('d-none');
                tous.classList.remove('d-none');
            }
        } 
           }
        
        let resultat;
        let index;
        function findAnnees(){
            let element=data.find(compareRow);
                    if(element!= undefined){
                        console.log('resultat=' + resultat);
                        let index=calendrier.findIndex(compareAnneUniv);
                        let indexNivR=niveauxActu.findIndex(compareAnneUnivEnteredR);
                        let indexNivA=niveauxActu.findIndex(compareAnneUnivEnteredA);
                       
                        document.getElementById('anneeUnivR').setAttribute('value',calendrier[index + indexNivR]);
                        document.getElementById('anneeUnivA').setAttribute('value', calendrier[index + indexNivA]);
                 
                    }
                    function compareAnneUniv(ele){
                    console.log(element.annee_univ_debut);
                    return ele===element.annee_univ_debut;
                }
                function compareAnneUnivEnteredR(ele){
                    return ele === document.getElementById('niveau').value;
                } 
                function compareAnneUnivEnteredA(ele){
                    return ele === document.getElementById('niveauA').value;
                }   
        }  
        let niveauxActu=[];
        let actualNiv;
        function findNiveau(){
                    document.getElementsByClassName('niveauD')[0].innerHTML="";
                    document.getElementsByClassName('niveauD')[1].innerHTML="";
                    let element=data.find(compareRow);
                    if(element!= undefined){
                        let tabs=[tGi, tGstr, tGm];
                        for(let tab of tabs){
                            console.log(tab);
                            resultat=tab.findIndex(compareNiveau);
                            if(resultat != -1){
                                for(let i=0; i<=resultat; i++){
                                    let option=document.createElement("option");
                                    let textNode=document.createTextNode(tab[i]);
                                    option.appendChild(textNode);
                                    option.setAttribute("value", tab[i]);
                                    
                                    //alert('actualNiv= '+ option);
                                    document.getElementsByClassName('niveauD')[1].appendChild(option);
                                    
                                    niveauxActu[i]=tab[i];
                                    if(i==resultat){
                                        let d = new Date();
                                        let month = d.getMonth()+1;
                                        if((month>=10 && month<=12)){
                                            break;
                                        }
                                        
                                    }
                                    option=document.createElement("option");
                                    textNode=document.createTextNode(tab[i]);
                                    option.appendChild(textNode);
                                    option.setAttribute("value", tab[i]);
                                    
                                    //document.getElementByID("niveauA").appendChild(option);
                                   
                                    document.getElementsByClassName('niveauD')[0].appendChild(option);
                                    
                                    // document.getElementsByClassName("niveau")[0].appendChild(option);
                                    // document.getElementsByClassName("niveau")[1].appendChild(option);
                                }
                                                           
                                break;
                            }
                        }
                    }      
                function compareNiveau(ele){
                    return ele===element.niveau;
                }
            }
                function dNoneTousForm(){
                
                    document.getElementsByClassName('conventionStage')[0].classList.add('d-none');
                    document.getElementsByClassName('releveNote')[0].classList.add('d-none');
                    document.getElementsByClassName('attestationSchool')[0].classList.add('d-none');
                }
                function seeAll(){
                    let seeAll=data.find(compareRow);
                    

                if(seeAll !== undefined){
                    document.getElementById('radio').classList.remove('d-none');
                    codeInput.setAttribute("readonly", "true");
                    codeCNE.setAttribute("readonly", "true");
                    email.setAttribute("readonly", "true");
                    codeInput.style.border="solid #ced4da thin";
                    codeCNE.style.border="solid #ced4da thin";
                    email.style.border="solid #ced4da thin";
                    document.getElementById('nonEtudiant').innerHTML="";
                 // document.getElementById('submit').removeAttribute('disabled');
                }else{
                    if(codeInput.value!="" && codeCNE.value!="" && email.value !=""){
                        codeInput.style.border="solid red";
                        codeCNE.style.border="solid red";
                        email.style.border="solid red";
                        document.getElementById('nonEtudiant').textContent="Les informations que vous avez entrées ne sont pas valides";
                    }
                    

                }

                }
                function fixBorderColor(input, see){
                    if(see != undefined){
                        input.style.border="solid green";
                    }else{
                        input.style.border="solid red";
                    }
                }
                function compareCodeApogee(ele){
                    return ele.code_apogee===codeInput.value;
                }
                function compareCNE(ele){
                    return ele.cne===codeCNE.value;
                }
                function compareEmail(ele){
                    return ele.email_etudiant===email.value;
                }
                function compareRow(ele){
                    if(codeInput.value !== "" && codeCNE.value !== "" && email.value !==""){
                        return ele.code_apogee===codeInput.value && ele.cne===codeCNE.value && ele.email_etudiant===email.value;    
                }else{
                    return false;
                }
            }
        }
    }
        
           
    </script>
</body>
</html>
