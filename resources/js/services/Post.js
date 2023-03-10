import instance from "./config";

export function GetTypePost() {
    return instance.get("/post/get-type-post");
}
export function UpdatePost(data) {
    return instance.post("/post/update-post",data,{
        headers: {
            "Content-Type":'multipart/form-data'
        },
    });
}
