<div>
    @foreach($entries as $entry)
        {{ \App\Models\User::find($entry->created_by)->user_nicename??'No User' }} <br>
        {{ "$entry->source_url?dataId=$entry->id" }}
    @endforeach
</div>


<div class="row">
    <div class="column order1" style="padding: 2%">
        <div style="border: 2px solid #87b24b;border-radius: 5px; width: 100%; padding: 20px">
            <div style="text-align: center; width: 100%; color: #87b24b; font-size: 24px">What do I Contribute ?</div>
            <br>
            <label for="form_1" style="color: #87b24b; font-size: 15px">What do I make better?</label>
            <input id="form_1" type="text">

            <label for="form_2" style="color: #87b24b; font-size: 15px">How do I improve the moment?</label>
            <input id="form_2" type="text">

            <label for="form_3" style="color: #87b24b; font-size: 15px">What am I doing when you “feel the
                flow”?</label>
            <input id="form_3" type="text">

            <label for="form_4" style="color: #87b24b; font-size: 15px; margin: 7px 0">What outcomes do you strive to realize when
                “feeling the flow”?</label>
            <input id="form_4" type="text">
        </div>
        <script>
            document.getElementById("form_1").addEventListener("change", function (){
                document.getElementById("input_8_11").value = document.getElementById("form_1").value;
            });
            document.getElementById("form_2").addEventListener("change", function (){
                document.getElementById("input_8_12").value = document.getElementById("form_2").value;
            });
            document.getElementById("form_3").addEventListener("change", function (){
                document.getElementById("input_8_13").value = document.getElementById("form_3").value;
            });
            document.getElementById("form_4").addEventListener("change", function (){
                document.getElementById("input_8_14").value = document.getElementById("form_4").value;
            });
        </script>

    </div>
    <div class="column order2">
        <h1 style="color: white;text-align: center; font-size: 2em"><font face="gellatio">Reveling My Purpose</font></h1>
        <img alt="" src="https://teamsetup-2.deskteam360.comwp-content/uploads/2024/03/xperience-fusion-24.webp">
    </div>
    <div class="column order3" style="padding: 2%">
        <div style="border: 2px solid #e1706b;border-radius: 5px; width: 100%; padding: 20px;">

            <div style="text-align: center; width: 100%; color: #e1706b; font-size: 24px">What Am I Good At ?</div>
            <br>
            <label for="form_5" style="color: #e1706b; font-size: 15px">What comes naturally to me?</label>
            <input id="form_5" type="text">

            <label for="form_6" style="color: #e1706b; font-size: 15px; margin: 7px 0">What do others consistently ask for my help with?</label>
            <input id="form_6" type="text">

            <label for="form_7" style="color: #e1706b; font-size: 15px">What do you do better than others?</label>
            <input id="form_7" type="text">

            <label for="form_8" style="color: #e1706b; font-size: 15px; margin: 7px 0">What talents or strengths do you leverage most often for success?</label>
            <input id="form_8" type="text">
        </div>
        <script>
            document.getElementById("form_5").addEventListener("change", function (){
                document.getElementById("input_8_7").value = document.getElementById("form_5").value;
            });
            document.getElementById("form_6").addEventListener("change", function (){
                document.getElementById("input_8_8").value = document.getElementById("form_6").value;
            });
            document.getElementById("form_7").addEventListener("change", function (){
                document.getElementById("input_8_9").value = document.getElementById("form_7").value;
            });
            document.getElementById("form_8").addEventListener("change", function (){
                document.getElementById("input_8_10").value = document.getElementById("form_8").value;
            });
        </script>
    </div>

    <div class="column-6 order4" style="padding: 2%">
        <div style="border: 2px solid #ffc808;border-radius: 5px; width: 100%; padding: 20px">
            <div style="text-align: center; width: 100%; color: #ffc808; font-size: 24px">What do I Love ?</div>

            <label for="form_9" style="color: #ffc808; font-size: 15px">What gives me energy?</label>
            <input id="form_9" type="text">

            <label for="form_10" style="color: #ffc808; font-size: 15px">When do I lose track of time?</label>
            <input id="form_10" type="text">

            <label for="form_11" style="color: #ffc808; font-size: 15px">What keeps my focus for long periods?</label>
            <input id="form_11" type="text">

            <label for="form_12" style="color: #ffc808; font-size: 15px">What do I strive for mastery in?</label>
            <input id="form_12" type="text">
        </div>
        <script>
            document.getElementById("form_9").addEventListener("change", function (){
                document.getElementById("input_8_3").value = document.getElementById("form_9").value;
            });
            document.getElementById("form_10").addEventListener("change", function (){
                document.getElementById("input_8_4").value = document.getElementById("form_10").value;
            });
            document.getElementById("form_11").addEventListener("change", function (){
                document.getElementById("input_8_5").value = document.getElementById("form_11").value;
            });
            document.getElementById("form_12").addEventListener("change", function (){
                document.getElementById("input_8_6").value = document.getElementById("form_12").value;
            });
        </script>
    </div>
</div>
