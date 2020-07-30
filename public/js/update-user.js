
function update(event) {
    event.preventDefault();
    id = (event.target.id);
    console.log($("#update_check").is(':checked'));

    name = document.getElementById('name').value;
    email = document.getElementById('email').value;
    company_name = document.getElementById('company_name').value;
    country = document.getElementById('country').value;
    city = $("#city").val();
    mobile = $("#mobile").val();
    address = $("#address").val();

    if($("#update_check").is(':checked')){
    var data = {"name":name, "email":email, "company_name":company_name, "country":country, "city":city, "mobile":mobile, "address":address, "id":id};
    }else {
        var data = {"name":name, "company_name":company_name, "country":country, "city":city, "mobile":mobile, "address":address, "id":id};
    }


    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: "/admin/update",
        //data: { "name": name, "email": email, "company_name": company_name, "country": country, "city": city, "mobile": mobile, "address": address, "id":id },
         data:data,
        success: function (response) {
            swal("Updation", "Successfull", "success", {
                button: "continue",
              })
                .then((value) => {
                    if(value)
                    document.location.href="/admin/dashboard";

                });

        },
        error: function (xhr) {
            response = (xhr.responseText);
            response = JSON.parse(response);
            errors = (response.errors);
            keys = Object.keys(errors);


            // console.log(errors.mobile);

            arr = {};

            for(l =0 ; l<keys.length; l++) {
                temp = keys[l];

                temp1 = errors[temp];
                temp1 = temp1[0];

                arr[keys[l]] = temp1;
            }



            element = document.querySelectorAll('.is-invalid');

            for (i = 0; i < element.length; i++) {
                ele = element[i];
                ele.classList.remove('is-invalid');

            }

            remove_span = document.querySelectorAll('.invalid-feedback');

            for (k = 0; k < remove_span.length; k++) {
                var remove = remove_span[k];

                // remove.textContent = '';
                remove.remove();
            }

            for (j = 0; j < keys.length; j++) {
                val = keys[j];

                obj = document.getElementById(keys[j]);
                obj.classList.add('is-invalid');
                obj.insertAdjacentHTML('afterend', ` <span class="invalid-feedback" role="alert">
                    <small>${arr[val]}</small>
                </span>`);
            }

            //        swal({
            //   title: "Good job!",
            //   text: ["name", "value"],
            //   icon: "success",
            //   button: "Aww yiss!",

            // });



        }
    });



}



if (matchMedia) {
    const mq = window.matchMedia("(max-width: 1200px)");
    mq.addListener(WidthChange);
    WidthChange(mq);
}

// media query change
function WidthChange(mq) {
    element = $('.input-group-text');



    if (mq.matches) {
        //window width is at least 500px

        for (i = 0; i < element.length; i++) {
            ele = element[i];
            ele.style.maxHeight = "25px";
        }



        if (matchMedia) {
            const wt = window.matchMedia("(max-width: 900px)");
            wt.addListener(changestyle);
            changestyle(wt);
        }





    } else {
        for (i = 0; i < element.length; i++) {
            ele = element[i];
            ele.style.maxHeight = "36px";
        }

    }

}




function changestyle(wt) {
    elements = $('.input-group-text');

    if (wt.matches) {
        for (i = 0; i < elements.length; i++) {
            ele = elements[i];
            ele.style.maxHeight = "24px";
        }
    } else {
        if (wt.matches) {
            for (i = 0; i < elements.length; i++) {
                ele = elements[i];
                ele.style.maxHeight = "20px";
            }
        }
    }

}


