const income = {
    amount: document.querySelector('#incomeValue'),
    date: document.querySelector('#incomeDate'),
    button: document.querySelector('#addIncomeBtn')
}


//------Aktualna data

const now = new Date();

let month = now.getMonth()+1;


function leadingZero(num) {
    if( num < 10) {
        num = `0${num}`;
    }
    return num;
}

month = leadingZero(month);

income.date.value = `${now.getFullYear()}-${month}-${now.getDate()}`;

//--------Walidacja formularza

const newStatement = document.querySelector('.statement');

function reset() {
    income.amount.value = "";
    income.date.value = "";
}

income.button.addEventListener('click', () => {
    if(!income.amount.value) alert("Podaj wartosć przychodu!");
    else if(income.amount.value <= 0 ) alert("Podaj przychód większy od zera!")
    else if(!income.date.value) alert("Podaj datę przychodu!")
    else {
        newStatement.innerText = "Przychód pomyślnie dodany!";
        income.button.innerText = "Dodaj kolejny";
        reset();
    }
})



 

