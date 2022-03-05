function sub(){
	var d = new Date();
	var d1 = document.getElementById("start").value;
	if(d.getFullYear() - d1.substring(0, 4) > 65){
		alert("Siamo spiacenti ma per l'idoneità al prelievo è richiesta un'età di 65 anni od inferiore.\nPuò comunque prenotare le analisi del sangue tramite l'apposito form.\n");
	}
	else {
		const str = 'Grazie ' + document.getElementById("fname").value + ' ' + document.getElementById("lname").value + ' per aver prenotato il tuo prelievo.\nPuoi presentarti alle';
		var str1;
		if(document.getElementById("GiornoDellaSettimana").value !=0){
			if(document.getElementById("GiornoDellaSettimana").value%2){
				if(document.getElementById("GiornoDellaSettimana").value==7){
					str1 = str; 
					str1+=" 11.30 presso il centro prelievi di Bergamo.\nE’ previsto il prelievo di ";
				}
				else{
					str1 = str; 
					str1+= " 8.30 presso il centro prelievi di ";
					str1+=document.getElementById("residence").value;
					str1+="\nE’ previsto il prelievo di ";
				}
			}
			else {
				str1 = str; 
				str1+= " 10.30 presso il centro prelievi di ";
				str1+= document.getElementById("residence").value;
				str1+="\nE’ previsto il prelievo di ";
			}
		}
		else {
			alert("Compilare giorno della settimana in cui si desidera effettuare il prelievo");
		}
		var cc;
		if(d.getFullYear() - d1.substring(0, 4) >= 18 && d.getFullYear() - d1.substring(0, 4) < 25){
			cc=150;
		}
		else if(d.getFullYear() - d1.substring(0, 4) >= 25 && d.getFullYear() - d1.substring(0, 4) < 35){
			cc=250;
		}
		else if(d.getFullYear() - d1.substring(0, 4) >= 35 && d.getFullYear() - d1.substring(0, 4) <= 65){
			cc=200;
		}
		if(document.querySelector('.checkFemale').checked){
			cc/=2;
		}
		str1+= cc;
		str1+=" cc di sangue\n";
		for(var i=0; i<cc/10; ++i){
			str1+='o';
		}
		alert(str1);
	}
}