import axios from "axios";

export const postData = (data: any) => {
    axios.post("http://127.0.0.1:8000/store",data );
};
