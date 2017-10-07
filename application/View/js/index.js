

function createLI(val)
{
    const input = $("<input>").attr("type","checkbox").addClass("form-check-input").on("change", e => {
        if(e.target.checked)
        {
            const t = $(e.target);
            const form = new FormData();
            form.append("id",t.attr("data-id"));
            t.parent().parent().remove();
            fetch("done", {
                method:"POST",
                body:form
            })
        }
    });
    const label = $("<label>").addClass("form-check-label").append(input).append(val);
    const li = $("<li>").addClass("task-item").append(label).attr("data-id",0);
    return li;
}

function add(val) {
    $("#index-task").append(createLI(val));
}


$("#add-button").on("click", () => {
    add();
});

$("#sentaku-list .list-group-item,#soji-list .list-group-item,#buy-list .list-group-item,#other-list .list-group-item")
    .on("click", async e => {
        const form = new FormData();
        form.append("id",  0  );
        const result = await fetch("add",{
            "method": "POST",
            body:form
        });
        add(e.target.textContent);

        $(e.target.parentNode.parentNode.parentNode.parentNode.parentNode).modal("hide");
    });


let kusalist = {
    "2017-09-10":5,
    "2017-09-12":1,
    "2017-09-14":2,
    "2017-09-15":3,
    "2017-09-16":4,
    "2017-09-17":5,
    "2017-10-01":5,
    "2017-10-02":1,
    "2017-10-04":2,
    "2017-10-05":3,
    "2017-10-06":4,
    "2017-10-07":5,
};

function makeKusa()
{
    const tomorrow = new Date();

    tomorrow.setDate(tomorrow.getDate() + 1);
    tomorrow.setHours(0);
    tomorrow.setMinutes(0);
    tomorrow.setSeconds(0);
    const t = tomorrow.getTime();

    const d = new Date(2017,8-1,1);
    const end = new Date(2017,12-1,1).getTime();
    const list = [];
    while(d.getTime() < t && d.getTime() < end )
    {
//        list.push($("<div>").addClass("kusa-"+(kusalist[d.toISOString().substring(0,10)]||0)));
        list.push($("<div>").addClass("kusa-"+(Math.floor(Math.random() * 6))));

        d.setDate(d.getDate() + 1);
    }
    $("#kusa").append(list);
}
makeKusa();