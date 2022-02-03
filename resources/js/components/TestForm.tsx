import * as React from "react";
import { useEffect, useState } from "react";
import { withFormik, FieldArray } from "formik";
import { redirectToSuccessPage } from "../services/Router";
import { postData } from "../services/Form";
import { incrementformviewcount } from "../services/Stats";
import axios from "axios";
import * as Yup from "yup";

const TestForm = (props: any) => {
    const { values, handleSubmit, handleChange, errors } = props;

    const [datas, setDatas] = useState([]);

    // useEffect(() => {
    //     // Imaginary call to increment the view count when this form first loads
    //     incrementformviewcount();
    // });

    useEffect(() => {
        async function fetchMyAPI() {
            await axios.get(`http://127.0.0.1:8000/read`).then((response) => {
                setDatas(response.data.datas);
            });
        }
        fetchMyAPI();
    }, []);

    return (
        <React.Fragment>
            <form
                method="POST"
                action="{{route('user.color')}}"
                className="divide-y space-y prose prose-sm max-w-none"
                onSubmit={handleSubmit}
            >
                <div className="px-4 pb-5 sm:px-6 sm:pb-6">
                    <h3 className="">Data sets</h3>

                    <FieldArray
                        name="messages"
                        render={(arrayHelpers) => (
                            <div>
                                <div className="mb-4 flex">
                                    <input
                                        type="text"
                                        placeholder="Name"
                                        className="
                                pt-2
                                pb-2
                                pl-2
                                pr-2
                                mr-4
                                block
                                w-full
                               rounded-md
                               border
                               border-gray-300
                               shadow-sm
                               focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                            "
                                        name="name"
                                        value={values.name || ""}
                                        onChange={handleChange}
                                    />
                                    {errors.name && (
                                        <div id="feedback">{errors.name}</div>
                                    )}
                                    <input
                                        type="text"
                                        placeholder="Color"
                                        className="
                                pt-2
                                pb-2
                                pl-2
                                pr-2
                                mr-4
                                block
                                w-full
                               rounded-md
                               border
                               border-gray-300
                               shadow-sm
                               focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50
                            "
                                        name="color"
                                        value={values.color || ""}
                                        onChange={handleChange}
                                    />
                                    {errors.color && (
                                        <div id="feedback">{errors.color}</div>
                                    )}
                                    {/* <button className="text-white bg-red-500 rounded p-2 px-4 hover:bg-red-600 font-bold">
                                        Delete set
                                    </button> */}
                                </div>
                                <button
                                    className="bg-gray-100 rounded p-2 px-4 hover:bg-gray-200"
                                    style={{ fontWeight: 600 }}
                                    type="submit"
                                >
                                    Add another set
                                </button>
                            </div>
                        )}
                    />
                </div>
                <div>
                    <table className="text-center">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>COLOR</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            {datas.map((data: any) => (
                                <tr key={data.id}>
                                    <td>{data.id}</td>
                                    <td>{data.name}</td>
                                    <td>{data.color}</td>
                                    <td>
                                    <button className="text-white bg-red-500 rounded p-2 px-4 hover:bg-red-600 font-bold">
                                        Delete set
                                    </button>
                                    </td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>
                <footer className="px-4 py-5 sm:p-6">
                    <button className="text-white bg-teal-500 rounded p-2 px-4 hover:bg-teal-600 font-bold">
                        Submit sets
                    </button>
                </footer>
            </form>
        </React.Fragment>
    );
};

export default withFormik({
    validate: (values) => {
        const errors: any = {};

        if (!values.name && !values.color) {
            errors.name = "Required";
            errors.color = "Required";
        } else if (!/^[A-Za-z]/.test(values.name)) {
            errors.name = "Name Must Be a String";
        } else if (!/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/.test(values.color)) {
            errors.color = "Use hex color value";
        }
        return errors;
    },

    handleSubmit: (values, { props }) => {
        // Post data to the backend
        postData(values);

        // Imaginary redirection on success
        redirectToSuccessPage();
    },
})(TestForm);
