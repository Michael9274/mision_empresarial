const initModal = (templateData) => {

    let {id,size,classHeader = '',header,content,footer = ''} = templateData;

    return `

        <div class="modal fade" id="${id}" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog ${size} modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header ${classHeader}">
                <h6><b>${header}</b></h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                ${content}
              </div>
              <div class="modal-footer">
                ${footer}
              </div>
            </div>
          </div>
        </div>
    `;
}

const closeModal = (modal) => {
    $(`#${modal}`).on('hidden.bs.modal', function(e) {
        $(`#${modal}`).remove()
    });
}

const asyncPost = async (queryData) => {
    let {url,formData} = queryData;
    let token = $('meta[name="csrf-token"]').attr('content');
    const settings = {
        method: 'POST',
        body: formData,
        headers: {
            "X-CSRF-Token": token
        }
    };

    const fetchResponse = await fetch(`${url}`, settings);
    const data = await fetchResponse.json();
    return data;

}

const asyncGet = async (url) => {
    const fetchResponse = await fetch(`${url}`);
    const data = await fetchResponse.json();
    return data;
}