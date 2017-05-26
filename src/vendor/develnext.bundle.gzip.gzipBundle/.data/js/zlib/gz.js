function gz(method, data){
	var jData = JSON.parse(data),
		out;

	switch(method){
		case 'encode':
			out = new Zlib.Gzip(jData).compress();
		break;

		case 'decode':
			out = new Zlib.Gunzip(jData).decompress();
		break;

		case 'compress':
			out = new Zlib.Deflate(jData).compress();
		break;

		case 'uncompress':
			out = new Zlib.Inflate(jData).decompress();
		break;
		
		case 'deflate':
			out = new Zlib.RawDeflate(jData).compress();
		break;

		case 'inflate':
			out = new Zlib.RawInflate(jData).decompress();
		break;
	}

	return document.getElementById("answer").innerHTML = JSON.stringify(out);
}