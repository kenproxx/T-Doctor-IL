onmessage = function(event) {
    handleDownloadRecord();
};

async function handleDownloadRecord() {
    let url = "/connect/video/handle-download-record";
    const response = await fetch(url);

    if (response.ok) {
        postMessage('Download completed!');
    }
}
