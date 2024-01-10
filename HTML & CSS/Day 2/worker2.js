self.onmessage = function(){
    let s = 0;
    for(let i=0;i<1000;i++){
        for(let j=0;j<1000;j++){
            s+= 1;
        }
    }
    self.postMessage(s)
}