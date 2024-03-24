
        function codeAddress() {
            document.getElementById("emp").value = localStorage.getItem("empleado").toUpperCase();;
            document.getElementById("stock").value = localStorage.getItem("stoc");
            stock = $("#stock").val();
            prec = $("#precio").val();
            mult= stock*prec;
            document.getElementById("monto").value = mult;
            j= localStorage.getItem("cont");
            nn= j+"4";
            localStorage.setItem(nn,prec);
            nn= j+"5";
            localStorage.setItem(nn,mult);
            j++;
            localStorage.setItem("cont",j);

            let tablaProducto= document.getElementById('tablaa');
            let cuerpoTabla= document.createElement('tbody');

            var num= localStorage.getItem("cont");
            nume= localStorage.getItem("cont");
            let fila;
            let td;

            for (var i = 1; i < num; i++) {

            nu=i+"2";
            co=i+"5";
            cc=localStorage.getItem(co);
            if(cc>0){
            fila= document.createElement('tr');
            td= document.createElement('td');
            td.innerText = localStorage.getItem(nu);
            fila.appendChild(td);

            nu=i+"3";
            td= document.createElement('td');
            td.innerText = localStorage.getItem(nu);
            fila.appendChild(td);

            nu=i+"4";
            td= document.createElement('td');
            td.innerText = localStorage.getItem(nu);
            fila.appendChild(td);

            nu=i+"5";
            td= document.createElement('td');
            td.innerText = localStorage.getItem(nu);
            fila.appendChild(td);
            const button = document.createElement('button');
            button.name = 'bot';
            button.class=  'btn';
            button.style.background=  '#04253a';
            button.style.height=  '35px';
            button.style.width=  '5rem';
            button.style.color=  '#ffffff';
            button.innerText = 'Eliminar';
            button.addEventListener("click",(event)=>{
            event.target.parentNode.parentNode.remove();
            localStorage.setItem(co,"0");

            });
            fila.appendChild(button);

            cuerpoTabla.appendChild(fila);
             }
            }

            tablaProducto.appendChild(cuerpoTabla);


        }
        window.onload = codeAddress;

        function muestra() {

        }



        function cambiar() {
            document.getElementById("precio").value = 0.0;
            document.getElementById("monto").value = 0;

        }




        function guarda() {
            stock = $("#stock").val();
            localStorage.setItem("stoc",stock);
            let productos= new Array(1);
            var cont= localStorage.getItem("cont");
            prec = $("#precio").val();
            mult= stock*prec;
            emp= $("#emp").val();
            fech= $("#txtfecha").val();
            codi= $("#codigopro").val();
            nn=cont+"0";
            localStorage.setItem(nn,emp);
            nn=cont+"1";
            localStorage.setItem(nn,fech);
            nn=cont+"2";
            localStorage.setItem(nn,codi);
            nn=cont+"3";
            localStorage.setItem(nn,stock);

        }


        function cambiar() {
            document.getElementById("precio").value = 0.0;
            document.getElementById("monto").value = 0;

        }
