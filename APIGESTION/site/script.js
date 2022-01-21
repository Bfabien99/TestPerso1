var invocation = new XMLHttpRequest();
var url = 'http://192.168.64.2/TestPerso1/APIGESTION/property';
const box = document.querySelector('.box');


fetch(url)
    .then
    (
       async (data) => { 
           data = await data.json()
           console.log(data)
        if(data.ok) {
           data.results.forEach((datas) => {

             let div  = document.createElement('div')
             div.className += "element"
             let H4 = document.createElement('h4')
             H4.innerText = "Id: "+datas.id 
             let H44 = document.createElement('h4')
             H44.innerText = "Proprio: "+datas.owner
              div.appendChild(H4)
              div.appendChild(H44)
    
              box.appendChild(div)
         
            box.innerHTML += 
            `   
                <div class="element">
                    <p class="text1">
                    <h4>id:  ${datas.id}</h4>
                    </p>
                    <p class="text1">
                    <h4>Nom:   ${datas.owner}</h4>
                    </p>
                    <p class="text2">
                    <h4>Numéro:   ${datas.tel}</h4>
                    </p>
                    <p class="text3">
                    <h4>Posté le:   ${datas.postdate}</h4>
                    </p>
                    <p class="text4">
                    <h4>Localisation:   ${datas.location}</h4>
                    </p>
                    <a href="/TestPerso1/APIGESTION/property/${datas.id}/" class="more">Voir</a>
                    <a href="/TestPerso1/APIGESTION/property/delete/${datas.id}/" class="more">delete</a>
                    
                </div>
            `
        })
        } else {
            alert("error")
        }
   
    }
    )