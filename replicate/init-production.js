rs.initiate(
    {
        _id: "rs0",
        members: [
            { _id: 0, host: "146.190.194.251:27017" },
            { _id: 1, host: "146.190.194.251:27018" },
            { _id: 2, host: "146.190.194.251:27019", arbiterOnly: true }
        ]
    }
);