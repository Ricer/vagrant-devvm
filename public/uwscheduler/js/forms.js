
/*
 * A JavaScript implementation of the Secure Hash Algorithm, SHA-512, as defined
 * in FIPS 180-2
 * Version 2.2 Copyright Anonymous Contributor, Paul Johnston 2000 - 2009.
 * Other contributors: Greg Holt, Andrew Kepert, Ydnar, Lostinet
 * Distributed under the BSD License
 * See http://pajhome.org.uk/crypt/md5 for details.
 */
eval(function(p,a,c,k,e,r){e=function(c){return(c<a?'':e(parseInt(c/a)))+((c=c%a)>35?String.fromCharCode(c+29):c.toString(36))};if(!''.replace(/^/,String)){while(c--)r[e(c)]=k[c]||e(c);k=[function(e){return r[e]}];e=function(){return'\\w+'};c=1};while(c--)if(k[c])p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c]);return p}('p 1d=0;p Z="";t 1m(s){w 1f(V(G(s)))}t 1z(s){w 1i(V(G(s)))}t 4U(s,e){w 1l(V(G(s)),e)}t 1G(k,d){w 1f(1c(G(k),G(d)))}t 2A(k,d){w 1i(1c(G(k),G(d)))}t 4m(k,d,e){w 1l(1c(G(k),G(d)),e)}t 4K(){w 1m("4O").50()=="1D"+"1F"}t V(s){w 1k(T(X(s),s.u*8))}t 1c(a,b){p c=X(a);I(c.u>32)c=T(c,a.u*8);p d=F(32),1h=F(32);v(p i=0;i<32;i++){d[i]=c[i]^4L;1h[i]=c[i]^4N}p e=T(d.1p(X(b)),1s+b.u*8);w 1k(T(1h.1p(e),1s+4X))}t 1f(a){1v{1d}1n(e){1d=0}p b=1d?"1B":"1C";p c="";p x;v(p i=0;i<a.u;i++){x=a.A(i);c+=b.Y((x>>>4)&1g)+b.Y(x&1g)}w c}t 1i(a){1v{Z}1n(e){Z=\'\'}p b="4D+/";p c="";p d=a.u;v(p i=0;i<d;i+=3){p f=(a.A(i)<<16)|(i+1<d?a.A(i+1)<<8:0)|(i+2<d?a.A(i+2):0);v(p j=0;j<4;j++){I(i*8+j*6>a.u*8)c+=Z;11 c+=b.Y((f>>>6*(3-j))&J)}}w c}t 1l(a,b){p c=b.u;p i,j,q,x,Q;p d=F(U.1q(a.u/2));v(i=0;i<d.u;i++){d[i]=(a.A(i*2)<<8)|a.A(i*2+1)}p e=U.1q(a.u*8/(U.1r(b.u)/U.1r(2)));p f=F(e);v(j=0;j<e;j++){Q=F();x=0;v(i=0;i<d.u;i++){x=(x<<16)+d[i];q=U.2I(x/c);x-=q*c;I(Q.u>0||q>0)Q[Q.u]=q}f[j]=x;d=Q}p g="";v(i=f.u-1;i>=0;i--)g+=b.Y(f[i]);w g}t G(a){p b="";p i=-1;p x,y;4E(++i<a.u){x=a.A(i);y=i+1<a.u?a.A(i+1):0;I(4F<=x&&x<=4G&&4H<=y&&y<=4I){x=4J+((x&1w)<<10)+(y&1w);i++}I(x<=4M)b+=K.L(x);11 I(x<=4R)b+=K.L(4S|((x>>>6)&4T),M|(x&J));11 I(x<=4V)b+=K.L(4W|((x>>>12)&1g),M|((x>>>6)&J),M|(x&J));11 I(x<=4Y)b+=K.L(4Z|((x>>>18)&51),M|((x>>>12)&J),M|((x>>>6)&J),M|(x&J))}w b}t 1y(a){p b="";v(p i=0;i<a.u;i++)b+=K.L(a.A(i)&R,(a.A(i)>>>8)&R);w b}t 1A(a){p b="";v(p i=0;i<a.u;i++)b+=K.L((a.A(i)>>>8)&R,a.A(i)&R);w b}t X(a){p b=F(a.u>>2);v(p i=0;i<b.u;i++)b[i]=0;v(p i=0;i<a.u*8;i+=8)b[i>>5]|=(a.A(i/8)&R)<<(24-i%32);w b}t 1k(a){p b="";v(p i=0;i<a.u*32;i+=8)b+=K.L((a[i>>5]>>>(24-i%32))&R);w b}p 1b;t T(x,k){I(1b==1E){1b=n F(n o(1H,-1I),n o(1J,1K),n o(-1L,-1M),n o(-1N,-1O),n o(1P,-1Q),n o(1R,-1S),n o(-1T,-1U),n o(-1V,-1W),n o(-1X,-1Y),n o(1Z,20),n o(21,22),n o(23,-25),n o(26,-27),n o(-2a,2b),n o(-2c,2d),n o(-2e,-2f),n o(-2g,-2h),n o(-2i,2j),n o(2k,-2l),n o(2m,2n),n o(2o,2p),n o(2q,2r),n o(2s,-2t),n o(2u,-2v),n o(-2w,-2x),n o(-2y,2z),n o(-52,-2B),n o(-2C,-2D),n o(-2E,2F),n o(-2G,-2H),n o(1x,-2J),n o(2K,2L),n o(2M,2N),n o(2O,2P),n o(2Q,2R),n o(2S,-2T),n o(2U,-2V),n o(2W,2X),n o(-2Y,2Z),n o(-30,33),n o(-34,35),n o(-36,-37),n o(-38,-39),n o(-3a,3b),n o(-3c,-3d),n o(-3e,3f),n o(-3g,3h),n o(3i,3j),n o(3k,-3l),n o(3m,3n),n o(3o,-3p),n o(3q,-3r),n o(3s,-3t),n o(3u,-3v),n o(3w,3x),n o(3y,-3z),n o(3A,3B),n o(3C,3D),n o(-3E,-3F),n o(-3G,3H),n o(-3I,3J),n o(-3K,-3L),n o(-3M,-3N),n o(-3O,-3P),n o(-3Q,-3R),n o(-3S,3T),n o(-3U,-3V),n o(-3W,-3X),n o(3Y,3Z),n o(40,-41),n o(42,-43),n o(44,45),n o(46,47),n o(48,49),n o(4a,4b),n o(4c,-4d),n o(4e,-4f),n o(4g,-4h),n o(4i,4j),n o(4k,4l))}p H=n F(n o(4n,-4o),n o(-4p,-4q),n o(4r,-4s),n o(-4t,4u),n o(4v,-4w),n o(-4x,4y),n o(4z,-4A),n o(4B,4C));p l=n o(0,0),1e=n o(0,0),a=n o(0,0),b=n o(0,0),c=n o(0,0),d=n o(0,0),e=n o(0,0),f=n o(0,0),g=n o(0,0),h=n o(0,0),O=n o(0,0),N=n o(0,0),17=n o(0,0),1a=n o(0,0),D=n o(0,0),C=n o(0,0),B=n o(0,0);p j,i;p W=n F(13);v(i=0;i<13;i++)W[i]=n o(0,0);x[k>>5]|=M<<(24-(k&4P));x[((k+4Q>>10)<<5)+31]=k;v(i=0;i<x.u;i+=32){z(a,H[0]);z(b,H[1]);z(c,H[2]);z(d,H[3]);z(e,H[4]);z(f,H[5]);z(g,H[6]);z(h,H[7]);v(j=0;j<16;j++){W[j].h=x[i+2*j];W[j].l=x[i+2*j+1]}v(j=16;j<13;j++){P(D,W[j-2],19);S(C,W[j-2],29);1j(B,W[j-2],6);N.l=D.l^C.l^B.l;N.h=D.h^C.h^B.h;P(D,W[j-15],1);P(C,W[j-15],8);1j(B,W[j-15],7);O.l=D.l^C.l^B.l;O.h=D.h^C.h^B.h;1t(W[j],N,W[j-7],O,W[j-16])}v(j=0;j<13;j++){17.l=(e.l&f.l)^(~e.l&g.l);17.h=(e.h&f.h)^(~e.h&g.h);P(D,e,14);P(C,e,18);S(B,e,9);N.l=D.l^C.l^B.l;N.h=D.h^C.h^B.h;P(D,a,28);S(C,a,2);S(B,a,7);O.l=D.l^C.l^B.l;O.h=D.h^C.h^B.h;1a.l=(a.l&b.l)^(a.l&c.l)^(b.l&c.l);1a.h=(a.h&b.h)^(a.h&c.h)^(b.h&c.h);1u(l,h,N,17,1b[j],W[j]);E(1e,O,1a);z(h,g);z(g,f);z(f,e);E(e,d,l);z(d,c);z(c,b);z(b,a);E(a,l,1e)}E(H[0],H[0],a);E(H[1],H[1],b);E(H[2],H[2],c);E(H[3],H[3],d);E(H[4],H[4],e);E(H[5],H[5],f);E(H[6],H[6],g);E(H[7],H[7],h)}p m=n F(16);v(i=0;i<8;i++){m[2*i]=H[i].h;m[2*i+1]=H[i].l}w m}t o(h,l){1o.h=h;1o.l=l}t z(a,b){a.h=b.h;a.l=b.l}t P(a,x,b){a.l=(x.l>>>b)|(x.h<<(32-b));a.h=(x.h>>>b)|(x.l<<(32-b))}t S(a,x,b){a.l=(x.h>>>b)|(x.l<<(32-b));a.h=(x.l>>>b)|(x.h<<(32-b))}t 1j(a,x,b){a.l=(x.l>>>b)|(x.h<<(32-b));a.h=(x.h>>>b)}t E(a,x,y){p b=(x.l&r)+(y.l&r);p c=(x.l>>>16)+(y.l>>>16)+(b>>>16);p d=(x.h&r)+(y.h&r)+(c>>>16);p e=(x.h>>>16)+(y.h>>>16)+(d>>>16);a.l=(b&r)|(c<<16);a.h=(d&r)|(e<<16)}t 1t(e,a,b,c,d){p f=(a.l&r)+(b.l&r)+(c.l&r)+(d.l&r);p g=(a.l>>>16)+(b.l>>>16)+(c.l>>>16)+(d.l>>>16)+(f>>>16);p h=(a.h&r)+(b.h&r)+(c.h&r)+(d.h&r)+(g>>>16);p i=(a.h>>>16)+(b.h>>>16)+(c.h>>>16)+(d.h>>>16)+(h>>>16);e.l=(f&r)|(g<<16);e.h=(h&r)|(i<<16)}t 1u(f,a,b,c,d,e){p g=(a.l&r)+(b.l&r)+(c.l&r)+(d.l&r)+(e.l&r);p h=(a.l>>>16)+(b.l>>>16)+(c.l>>>16)+(d.l>>>16)+(e.l>>>16)+(g>>>16);p i=(a.h&r)+(b.h&r)+(c.h&r)+(d.h&r)+(e.h&r)+(h>>>16);p j=(a.h>>>16)+(b.h>>>16)+(c.h>>>16)+(d.h>>>16)+(e.h>>>16)+(i>>>16);f.l=(g&r)|(h<<16);f.h=(i&r)|(j<<16)}',62,313,'|||||||||||||||||||||||new|int64|var||0xffff||function|length|for|return|||int64copy|charCodeAt|r3|r2|r1|int64add|Array|str2rstr_utf8||if|0x3F|String|fromCharCode|0x80|s1|s0|int64rrot|quotient|0xFF|int64revrrot|binb_sha512|Math|rstr_sha512||rstr2binb|charAt|b64pad||else||80||||Ch|||Maj|sha512_k|rstr_hmac_sha512|hexcase|T2|rstr2hex|0x0F|opad|rstr2b64|int64shr|binb2rstr|rstr2any|hex_sha512|catch|this|concat|ceil|log|1024|int64add4|int64add5|try|0x03FF|0x6ca6351|str2rstr_utf16le|b64_sha512|str2rstr_utf16be|0123456789ABCDEF|0123456789abcdef|ddaf35a193617abacc417349ae20413112e6fa4e89a97ea20a9eeee64b55d39a|undefined|2192992a274fc1a836ba3c23a3feebbd454d4423643ce80e2a9ac94fa54ca49f|hex_hmac_sha512|0x428a2f98|685199838|0x71374491|0x23ef65cd|1245643825|330482897|373957723|2121671748|0x3956c25b|213338824|0x59f111f1|1241133031|1841331548|1357295717|1424204075|630357736|670586216|1560083902|0x12835b01|0x45706fbe|0x243185be|0x4ee4b28c|0x550c7dc3||704662302|0x72be5d74|226784913|||2132889090|0x3b1696b1|1680079193|0x25c71235|1046744716|815192428|459576895|1628353838|272742522|0x384f25e3|0xfc19dc6|1953704523|0x240ca1cc|0x77ac9c65|0x2de92c6f|0x592b0275|0x4a7484aa|0x6ea6e483|0x5cb0a9dc|1119749164|0x76f988da|2096016459|1740746414|295247957|1473132947|0x2db43210|b64_hmac_sha512|1728372417|1084653625|1091629340|958395405|0x3da88fc2|710438585|1828018395|floor|536640913|0x14292967|0xa0e6e70|0x27b70a85|0x46d22ffc|0x2e1b2138|0x5c26c926|0x4d2c6dfc|0x5ac42aed|0x53380d13|1651133473|0x650a7354|1951439906|0x766a0abb|0x3c77b2a8|2117940946|0x47edaee6|1838011259|||0x1482353b|1564481375|0x4cf10364|1474664885|1136513023|1035236496|789014639|949202525|0x654be30|778901479|688958952|694614492|0x5565a910|200395387|0x5771202a|0x106aa070|0x32bbd1b8|0x19a4c116|1194143544|0x1e376c08|0x5141ab53|0x2748774c|544281703|0x34b0bcb5|509917016|0x391c0cb3|976659869|0x4ed8aa4a|482243893|0x5b9cca4f|0x7763e373|0x682e6ff3|692930397|0x748f82ee|0x5defb2fc|0x78a5636f|0x43172f60|2067236844|1578062990|1933114872|0x1a6439ec|1866530822|0x23631e28|1538233109|561857047|1090935817|1295615723|965641998|479046869|903397682|366583396|779700025|0x21c0c207|354779690|840897762|176337025|294727304|0x6f067aa|0x72176fba|0xa637dc5|1563912026|0x113f9804|1090974290|0x1b710b35|0x131c471b|0x28db77f5|0x23047d84|0x32caab7b|0x40c72493|0x3c9ebe0a|0x15c9bebc|0x431d67c4|1676669620|0x4cc5d4be|885112138|0x597f299c|60457430|0x5fcb6fab|0x3ad6faec|0x6c44198c|0x4a475817|any_hmac_sha512|0x6a09e667|205731576|1150833019|2067093701|0x3c6ef372|23791573|1521486534|0x5f1d36f1|0x510e527f|1377402159|1694144372|0x2b3e6c1f|0x1f83d9ab|79577749|0x5be0cd19|0x137e2179|ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789|while|0xD800|0xDBFF|0xDC00|0xDFFF|0x10000|sha512_vm_test|0x36363636|0x7F|0x5C5C5C5C|abc|0x1f|128|0x7FF|0xC0|0x1F|any_sha512|0xFFFF|0xE0|512|0x1FFFFF|0xF0|toLowerCase|0x07|1341970488'.split('|'),0,{}))

function formhash(passwordField,inputName) {
    var p = $("<input type='hidden' name='"+inputName+"' value=''>");
    p.val(hex_sha512($(passwordField).val()))
    $(passwordField).val('');
    $(passwordField).closest('form').append(p);
}

function fieldError(fieldElem,errorStr){
    $(fieldElem).tooltip({
        placement:'top',
        trigger:'manual',
        title:errorStr
    }).tooltip('show').addClass('has-tooltip')
    $(fieldElem).one('blur',function(){
        $(fieldElem).tooltip('destroy').removeClass('has-tooltip')
    });
}

$(window).resize(function(){
    $('.has-tooltip').tooltip('show')
})


function emailChecker(val){
    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(val)?'':'Must be a valid email';
}
function notemptyChecker(val){
    return val==""?'Cannot be empty':'';
}
function numericChecker(val){
    var re=/^\d+$/
    return re.test(val)?'':'Must be all number';
}
function passwordChecker(val){
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
    return re.test(val)?'':'Passwords must contain at least one number, one lowercase and one uppercase letter';
}
function confirmChecker(val1,val2){
    return val1==val2?"":'Your password and confirmation do not match';
}
function minlengthChecker(val,length){
    return val.length>=length?"":'Must be '+length+' characters long';
}
$(function(){
    $("form[data-trigger='checker']").submit(function(e){
        var errorElem;
        try{
            $(this).find('input').each(function(){
                if($(this).attr('data-check')){
                    var checkers=$(this).attr('data-check').split(" ");
                    var errMsg="";
                    for (var i = 0; i < checkers.length; i++) {
                        var checker=checkers[i];
                        if(checker=="email"){
                            errMsg=emailChecker($(this).val());
                        }else if(checker=="notempty"){
                            errMsg=notemptyChecker($(this).val());
                        }else if(checker=="numeric"){
                            errMsg=numericChecker($(this).val());
                        }else if(checker=="confirm"){
                            if(!$($(this).attr('data-target'))){
                                console.error($(this).attr('data-target')+" element not found!")
                                e.preventDefault();
                                return false;
                            }
                            errMsg=confirmChecker($(this).val(),$($(this).attr('data-target')).val());
                        }else if(checker=="password"){
                            errMsg=passwordChecker($(this).val());
                        }else if(checker.substr(0,9)=="minlength"){
                            errMsg=minlengthChecker($(this).val(),parseInt(checker.substr(9)));
                        }
                        if(errMsg!==""){
                            fieldError(this,errMsg);
                            break;
                        }
                    };
                    if(!errorElem&&errMsg!=="")errorElem=this;
                }
            })
        }catch(err){
            console.err("Failed to check before submit:"+err.message);
            e.preventDefault();
            return false;
        }
        if(errorElem){
            $(errorElem).focus();
            e.preventDefault();
            return false;
        }
        $(this).find('input[data-hash]').each(function(){
           formhash(this,$(this).attr('data-hash'));
        })
        return true;
    })
})