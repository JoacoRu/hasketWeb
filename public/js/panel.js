window.onload = function() {
    async function bringAllPj(user) {
        let pass = JSON.stringify({pass: 'hasketT%y6U/!1'});
        fetch("http://145.239.19.132:3001/characters/balas16k",
        {
            method: "GET",
            body: pass,
            headers: {
                'Content-type': 'application/json; charset=utf-8',
                'Access-Control-Allow-Origin': '*',
                'Content-Length': '4'
            },
        })
        .then((data) => {
            JSON.parse(data);
            console.log(data);
          })
          .catch((error) => {
            throw error;
          })
    }

    bringAllPj();
}