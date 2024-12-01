import React from "react";
import { FiCheck } from "react-icons/fi";

const ProgressSteps = () => {
    const steps = [
        { id: 1, label: "Order received", icon: <FiCheck />, status: "completed" },
        { id: 2, label: "Processing", status: "current" },
        { id: 3, label: "On the way", status: "upcoming" },
        { id: 4, label: "Delivered", status: "upcoming" },
    ];

    return (
        <div className="relative my-10">
            {/* Horizontal Progress Bar */}
            <div className="hidden mx-20 -mb-6 md:flex">
                <div className="flex w-full h-1.5 bg-gray-200 rounded-full overflow-hidden">
                    <div className="flex flex-col justify-center w-1/2 overflow-hidden bg-orange-500 rounded-full"></div>
                </div>
            </div>

            {/* Vertical Progress Bar for Small Screens */}
            <div className="absolute inset-y-0 flex -translate-x-1/2 start-1/2 md:hidden">
                <div className="absolute inset-y-0 start-1/2 -translate-x-1/2 flex h-full w-1.5 bg-gray-200 rounded-full overflow-hidden">
                    <div className="absolute top-0 bottom-1/2 start-1/2 -translate-x-1/2 w-1.5 flex flex-col justify-center overflow-hidden bg-orange-500 rounded-full"></div>
                </div>
            </div>

            {/* Steps */}
            <div className="relative z-10 flex flex-col items-center justify-between gap-8 mx-10 md:flex-row">
                {steps.map((step) => (
                    <div key={step.id} className="flex flex-col items-center justify-center">
                        {/* Step Icon */}
                        <div
                            className={`w-10 h-10 flex justify-center items-center rounded-full ${
                                step.status === "completed"
                                    ? "bg-orange-500 text-white"
                                    : step.status === "current"
                                    ? "bg-orange-500 text-white"
                                    : "backdrop-blur-sm border border-dashed border-orange-500 text-primary"
                            }`}
                        >
                            {step.icon || <span className="text-sm font-medium">{`0${step.id}`}</span>}
                        </div>
                        {/* Step Label */}
                        <h4
                            className={`text-sm text-default-800 mt-3 p-2 ${
                                step.status === "current" ? "md:bg-transparent bg-gray-100 shadow rounded-lg" : ""
                            }`}
                        >
                            {step.label}
                        </h4>
                    </div>
                ))}
            </div>
        </div>
    );
};

export default ProgressSteps;
